# Security Policy

## Supported Versions

Only the latest version of LandingPages is supported with security updates.

## Reporting a Vulnerability

If you discover a security vulnerability within LandingPages, please send an email to the maintainers. All security vulnerabilities will be promptly addressed.

Please include the following information in your report:
- A description of the vulnerability
- Steps to reproduce the vulnerability
- Affected versions
- If known, a suggested fix or mitigation

## Security Best Practices

When deploying LandingPages to production, please ensure:

1. **Environment Variables**: Never commit your `.env` file to version control
2. **APP_KEY**: Always set a unique `APP_KEY` in production
3. **APP_DEBUG**: Set `APP_DEBUG=false` in production
4. **Database**: Use strong database passwords
5. **HTTPS**: Always use HTTPS in production
6. **File Permissions**: Ensure proper file permissions on the server
7. **Regular Updates**: Keep dependencies up to date

## Disclaimer

This project is provided as-is without warranty. The maintainers are not responsible for any security issues that may arise from improper configuration or usage of this software.
