import ftplib
import os
import sys

FTP_HOST = 'laravel.rtyazilim.com'
FTP_USER = 'laravel@laravel.rtyazilim.com'
FTP_PASS = 'vAY-Dmr-VJ7-vqG'

LOCAL_ROOT = r'c:\Users\RuhiS\OneDrive\Desktop\RT Yazılım Projeler Github\Laravel-E-Ticaret'

SKIP_DIRS = {'.git', 'node_modules', 'vendor', '.idea', '.vscode', '.fleet', '.nova', '.zed', '.phpunit.cache'}
SKIP_FILES = {'composer.phar', 'database.sqlite', '.env'}

uploaded = 0
errors = 0

def ensure_remote_dir(ftp, path):
    dirs = path.split('/')
    current = ''
    for d in dirs:
        if not d:
            continue
        current += '/' + d
        try:
            ftp.cwd(current)
        except:
            try:
                ftp.mkd(current)
            except:
                pass

def clean_remote(ftp, path='/'):
    try:
        ftp.cwd(path)
        items = []
        ftp.retrlines('LIST', items.append)
        for item in items:
            parts = item.split()
            name = parts[-1]
            if name in ('.', '..'):
                continue
            full = path.rstrip('/') + '/' + name
            if item.startswith('d'):
                clean_remote(ftp, full)
                try:
                    ftp.rmd(full)
                except:
                    pass
            else:
                try:
                    ftp.delete(full)
                except:
                    pass
    except Exception as e:
        print(f"Clean error: {e}")

def upload_dir(ftp, local_path, remote_base):
    global uploaded, errors
    for item in os.listdir(local_path):
        local_item = os.path.join(local_path, item)
        
        if item in SKIP_DIRS:
            continue
        if item in SKIP_FILES:
            continue
            
        rel = os.path.relpath(local_item, LOCAL_ROOT).replace('\\', '/')
        remote_path = '/' + rel
        
        if os.path.isdir(local_item):
            ensure_remote_dir(ftp, remote_path)
            upload_dir(ftp, local_item, remote_base)
        else:
            try:
                remote_dir = '/'.join(remote_path.split('/')[:-1])
                if remote_dir:
                    ensure_remote_dir(ftp, remote_dir)
                with open(local_item, 'rb') as f:
                    ftp.storbinary(f'STOR {remote_path}', f)
                uploaded += 1
                if uploaded % 50 == 0:
                    print(f"  Uploaded {uploaded} files...")
            except Exception as e:
                errors += 1
                print(f"  ERROR uploading {rel}: {e}")

print("Connecting to FTP...")
ftp = ftplib.FTP(FTP_HOST, timeout=30)
ftp.login(FTP_USER, FTP_PASS)

print("Cleaning remote directory...")
clean_remote(ftp)

print("Uploading project...")
ftp.cwd('/')
upload_dir(ftp, LOCAL_ROOT, '/')

ftp.quit()
print(f"\nDone! Uploaded: {uploaded}, Errors: {errors}")
