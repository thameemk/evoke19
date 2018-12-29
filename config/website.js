const tailwind = require('../tailwind');

module.exports = {
  pathPrefix: '/', // Prefix for all links. If you deploy your site to example.com/portfolio your pathPrefix should be "/portfolio"

  siteTitle: 'Evoke19', // Navigation and Site Title
  siteTitleAlt: 'Evoke', // Alternative Site title for SEO
  siteUrl: 'https://portfolio-cara.netlify.com', // Domain of your site. No trailing slash!
  siteLanguage: 'en', // Language Tag on <html> element
  siteLogo: '/logos/logo-1024.png', // Used for SEO and manifest
  siteDescription: 'The official site for all things Evoke19',

  // siteFBAppID: '123456789', // Facebook App ID - Optional
  userTwitter: '@Evoke19', // Twitter Username
  ogSiteName: 'Evoke19', // Facebook Site Name
  ogLanguage: 'en_US', // Facebook Language

  // Manifest and Progress color
  themeColor: tailwind.colors.orange,
  backgroundColor: tailwind.colors.blue,
};

