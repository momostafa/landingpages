# Contributing to Landing Pages Starter Kit

Thank you for your interest in contributing to the Landing Pages Starter Kit! This document provides guidelines and instructions for contributing to the project.

## Code of Conduct

- Be respectful and inclusive
- Provide constructive feedback
- Focus on what is best for the community
- Show empathy towards other community members

## How to Contribute

### Reporting Bugs

Before creating bug reports, please check the existing issues to avoid duplicates. When creating a bug report, include:

- A clear and descriptive title
- Steps to reproduce the issue
- Expected behavior
- Actual behavior
- Screenshots or error messages if applicable
- Environment details (PHP version, Laravel version, OS)
- Any relevant code snippets

### Suggesting Enhancements

Enhancement suggestions are welcome! Please:

- Use a clear and descriptive title
- Provide a detailed description of the proposed enhancement
- Explain why this enhancement would be useful
- Provide examples of how the enhancement would be used

### Pull Requests

1. **Fork the repository**
   ```bash
   # Fork the repository on GitHub, then clone your fork
   git clone https://github.com/yourusername/landingpages.git
   cd landingpages
   ```

2. **Create a branch**
   ```bash
   git checkout -b feature/your-feature-name
   # or
   git checkout -b fix/your-bug-fix
   ```

3. **Make your changes**
   - Follow the existing code style
   - Write clear, descriptive commit messages
   - Add tests for new features or bug fixes
   - Update documentation as needed

4. **Test your changes**
   ```bash
   composer run test
   ./vendor/bin/pint
   ```

5. **Commit your changes**
   ```bash
   git add .
   git commit -m "Add your commit message here"
   ```

6. **Push to your fork**
   ```bash
   git push origin feature/your-feature-name
   ```

7. **Create a Pull Request**
   - Provide a clear description of your changes
   - Reference any related issues
   - Include screenshots for UI changes

## Development Guidelines

### Code Style

- Follow PSR-12 coding standards
- Use Laravel Pint for code formatting
- Run `./vendor/bin/pint` before committing
- Write descriptive variable and function names
- Add comments for complex logic

### Testing

- Write tests for new features
- Ensure all tests pass before submitting a PR
- Aim for high test coverage
- Use Pest for testing (configured in the project)

### Documentation

- Update README.md for user-facing changes
- Add inline comments for complex code
- Document new page blocks with examples
- Update CHANGELOG.md (if it exists) for significant changes

### Adding New Page Blocks

When adding new page blocks:

1. Create the block class in `app/Filament/Fabricator/PageBlocks/`
2. Create the Blade view in `resources/views/components/filament-fabricator/page-blocks/`
3. Follow the existing block structure
4. Make blocks configurable via Filament forms
5. Ensure responsive design
6. Test on both light and dark modes
7. Document the block in the README

### Template Guidelines

- Ensure templates are responsive
- Support both light and dark modes
- Use Tailwind CSS classes
- Follow accessibility best practices
- Optimize images and assets
- Test across different browsers

## Project Structure

Understanding the project structure will help you contribute effectively:

```
app/
├── Filament/
│   ├── Fabricator/
│   │   ├── Layouts/       # Page layout definitions
│   │   └── PageBlocks/   # Page block logic
│   └── Resources/         # Filament admin resources
resources/
├── views/
│   ├── components/
│   │   └── filament-fabricator/
│   │       ├── layouts/   # Layout blade templates
│   │       └── page-blocks/ # Block blade templates
│   └── templates/         # Template-specific assets
```

## Getting Help

If you need help:

- Check existing issues and discussions
- Read the documentation in README.md
- Ask questions in GitHub Discussions
- Review existing code for patterns

## Recognition

Contributors will be recognized in:
- The CONTRIBUTORS.md file (if added)
- Release notes for significant contributions
- Project documentation for major features

## License

By contributing, you agree that your contributions will be licensed under the MIT License.

## Questions?

If you have questions about contributing, feel free to open an issue or discussion on GitHub.
