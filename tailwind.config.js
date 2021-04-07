module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      keyframes: {
          pop: {
           '0%': { 
             marginTop: '-15px',
             opacity: '0'
            },
           '100%': { 
             marginTop: '0',
             opacity: '1' 
            },
         }
      },
      animation: {
         pop: 'pop 0.3s ease-out 1',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
