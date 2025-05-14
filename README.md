# GoDaddy Deployment Instructions for RAPHA Therapies Website

This guide explains how to deploy your RAPHA Therapies website to GoDaddy hosting.

## Deployment Steps

### 1. Prepare Your GoDaddy Hosting Account

1. Log in to your GoDaddy account
2. Access cPanel for your hosting plan
3. Make sure you have FTP access configured

### 2. Configure Form Handling

Since GoDaddy shared hosting doesn't natively support Node.js, you have two options for handling form submissions:

#### Option A: Use Formspree for Form Handling
1. Create a free account at [Formspree.io](https://formspree.io/)
2. Create a new form and get your form endpoint URL
3. Replace the action attribute in the contact form with your Formspree URL

#### Option B: Create a PHP Form Handler
1. Create a PHP file named `form-handler.php` in your GoDaddy hosting
2. Use the provided template to handle form submissions
3. Upload this file to your web server

### 3. Upload Files to GoDaddy

1. Use an FTP client (FileZilla, Cyberduck, etc.)
2. Connect to your GoDaddy server using your FTP credentials
3. Upload all HTML, CSS, JavaScript, and image files to the `public_html` folder

### 4. Configure Domain Settings

1. Make sure your domain is pointed to GoDaddy nameservers
2. Verify DNS settings are properly configured

## Additional Resources

- [GoDaddy cPanel Guide](https://www.godaddy.com/help/get-started-with-cpanel-hosting-30362)
- [FTP Upload Instructions](https://www.godaddy.com/help/upload-files-to-my-web-hosting-account-5036)