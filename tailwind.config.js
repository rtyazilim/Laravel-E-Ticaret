export default {
    darkMode: 'class',
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './app/**/*.php',
    ],
    theme: {
        extend: {
            colors: {
                ink: '#0f172a',
                brand: {
                    50: '#eef6ff',
                    100: '#d9ebff',
                    500: '#2563eb',
                    600: '#1d4ed8',
                    700: '#1e40af',
                },
                mint: '#10b981',
                coral: '#f97316',
            },
            boxShadow: {
                soft: '0 18px 50px rgba(15, 23, 42, .10)',
                lift: '0 20px 65px rgba(15, 23, 42, .16)',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
