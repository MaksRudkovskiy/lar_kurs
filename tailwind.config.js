function withOpacityValue(variable) {
  return ({ opacityValue }) => {
    if (opacityValue === undefined) {
      return `rgb(var(${variable}))`
    }
    return `rgb(var(${variable}) / ${opacityValue})`
  }
}

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      backgroundColor: {
          'c171717': '#171717',
          'c202124': '#202124',
          'c303134': '#303134'
      },
      colors: {
        custom: {
          '171717': "#171717",
          '303134': '#303134',
          '202124': '#202124',
          'EDF1FF': '#EDF1FF',
          'C1CFFF': '#C1CFFF',
          '4D52BC': '#4D52BC',
          '2d2f37': '#2d2f37'
        }
      },
      hover: {
        'C1CFFF': '#C1CFFF',
        '4D52BC': '#4D52BC',
      },
      transitionDuration: {
        '0.5s': '0.5s',
        '0.3s': '0.3s',
      },
      border: {
        '4D52BC': '#4D52BC',
      }
    },
  },
  plugins: [
    require('tailwind-scrollbar'),
    require('flowbite/plugin')({
      charts: true,
    }),
  ],
  
}



