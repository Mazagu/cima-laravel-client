# Coding Standards

This document outlines the coding standards that should be followed when contributing to the CIMA PHP Library project. Consistent coding standards improve the readability and maintainability of the codebase.

## PHP Standards

- Use [PSR-12](https://www.php-fig.org/psr/psr-12/) as the coding style standard for PHP code.
- Use an [automatic code formatter](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) to ensure consistent code formatting.

## Naming Conventions

### Classes

- Use PascalCase for class names.
- Class names should be descriptive and self-explanatory.

### Methods and Functions

- Use camelCase for method and function names.
- Method and function names should be descriptive and follow the "verbNoun" naming pattern.

### Variables

- Use camelCase for variable names.
- Variable names should be descriptive and meaningful.

### Constants

- Use uppercase letters and underscores for constant names.
- Constants should be declared at the top of the file and be descriptive.

### File Names

- Use lowercase letters and hyphens for file names.
- Class names and file names should match.

## Documentation

- Use PHPDoc-style comments for documenting classes, methods, functions, and properties.
- Document code that may not be immediately clear to other developers.
- Provide meaningful descriptions for parameters, return types, and exceptions.

## Indentation and Whitespace

- Use four spaces for indentation.
- Avoid trailing whitespace.

## Line Length and Formatting

- Keep lines of code under 120 characters.
- Break long lines into multiple lines when necessary for readability.

## Commit Messages

- Use descriptive commit messages that succinctly explain the purpose of the commit.
- Begin the commit message with a capitalized verb phrase.

## Pull Requests

- Keep pull requests focused on a single feature or bug fix.
- Ensure your pull request adheres to the [Pull Request Guidelines](CONTRIBUTING.md).

## Licensing

By contributing to this repository, you agree to license your contributions under the GNU General Public License v3.0. See [LICENSE](LICENSE) for details.