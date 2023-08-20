# Cima Laravel Client
[![License](https://img.shields.io/badge/license-GPL-blue.svg)](https://www.gnu.org/licenses/gpl-3.0.en.html)

Laravel client to abstract REST calls to CIMA's API

## What's CIMA
CIMA (Centro de Información Online de Medicamentos de la Agencia Española de Medicamentos y Productos Sanitarios) is the Online Information Center for Medicines provided by the Spanish Agency for Medicines and Medical Devices (AEMPS). It serves as a comprehensive database offering up-to-date information about authorized medicinal products, including details about active ingredients, dosages, manufacturers, and more. CIMA is a valuable resource for healthcare professionals and the public seeking accurate information about authorized medicines in Spain.
## Features

- Easily access medication information from CIMA.
- Retrieve detailed medication data by ID.
- Retrieve a list of medications.

## Installation

Install the library using Composer:

```bash
composer require your-username/your-library

## How to Use

### Find Medication by ID

```php
try {
    $medicationId = '51347'; // Replace with the desired medication ID
    $medication = $cimaRepository->find($medicationId);
    
    // Process the $medication object
} catch (HttpException $e) {
    // Handle HTTP exceptions
}

### Retrieve List of Medications

```php
try {
    $medicationList = $cimaRepository->all();
    
    // Process the $medicationList object
} catch (HttpException $e) {
    // Handle HTTP exceptions
}

## Contributing

If you'd like to contribute to this library, please follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b my-feature-branch`.
3. Make your changes and commit them: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin my-feature-branch`.
5. Open a pull request.

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on the code of conduct, and the process for submitting pull requests.

## License

This project is licensed under the [GNU General Public License v3.0](LICENSE).
