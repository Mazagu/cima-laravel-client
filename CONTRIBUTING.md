# Contributing Guidelines

Thank you for considering contributing to the CIMA PHP Library! We appreciate your effort to make this library better.

## Code of Conduct

Please note that by participating in this project, you are expected to adhere to the [Code of Conduct](). Please ensure a respectful and inclusive environment for everyone.

## How to Contribute

1. Fork the repository on GitHub.
2. Clone the forked repository to your local machine.
3. Create a new branch for your feature or bug fix: `git checkout -b my-feature`.
4. Run `composer install --dev` and make your changes to the codebase.
5. Run the fixer script and and ensure the tests pass: `./fixer.sh`.
6. Commit your changes: `git commit -m 'Add new feature'`.
7. Push your branch to your fork: `git push origin my-feature`.
8. Open a pull request against the `main` branch of the original repository.

## Pull Request Guidelines

- Ensure your code adheres to the [coding standards](CODING_STANDARDS.md) used in the project.
- Make sure your commits have meaningful messages and are properly formatted.
- Provide a clear and descriptive title for your pull request.
- Include a detailed description of the changes you've made.
- If your pull request is related to an issue, reference it in the description using `#issue-number`.

## Testing

Before submitting your pull request, please make sure that:

- All existing tests are passing without errors.
- You have added new tests for the code you've added or modified.

## Code Style

Please follow the coding standards outlined in [coding standards](CODING_STANDARDS.md) to maintain consistent code style across the project.

## Licensing

By contributing to this repository, you agree that your contributions will be licensed under the GNU General Public License v3.0. See [LICENSE](LICENSE) for details.