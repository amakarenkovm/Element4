module.exports = {
  content: [
    './*.php',
    './inc/**/*.php',
    './template-parts/**/*.php',
    './assets/**/*.js',
    './sections/**/*.php',
    './components/**/*.php',
    './woocommerce/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        second: '#4F4F4F',
        body: '#E5E5E5',
        acetDark: '#323232',
        acentYellow: '#FF9309',
        opacity: 'rgba(0, 0, 0, 0.54)',
      },
      fontFamily: {
        heading: ["'Raleway', sans-serif"],
        body: ["'Gilroy', sans-serif"],
      },
      borderRadius: {
        max: '80px',
      },
      animation: {
        bounceSlow: 'bounceSlow 1s ease-in infinite',
      },
      keyframes: {
        bounceSlow: {
          '0%': { left: '100px' },
          '50%': { left: '105px ' },
          '100%': { left: '100px' },
        },
      },
    },
  },
  plugins: [require('@tailwindcss/typography')],
}
