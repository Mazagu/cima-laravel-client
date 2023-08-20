# Cima Laravel Client
[![License](https://img.shields.io/badge/license-GPL-blue.svg)](https://www.gnu.org/licenses/gpl-3.0.en.html)

Laravel client to abstract REST calls to CIMA's API

## What's CIMA
CIMA (Centro de Información Online de Medicamentos de la Agencia Española de Medicamentos y Productos Sanitarios) is the Online Information Center for Medicines provided by the Spanish Agency for Medicines and Medical Devices (AEMPS). It serves as a comprehensive database offering up-to-date information about authorized medicinal products, including details about active ingredients, dosages, manufacturers, and more. CIMA is a valuable resource for healthcare professionals and the public seeking accurate information about authorized medicines in Spain.
## Features

- Medication Retrieval: Retrieve detailed information about specific medications using their registration numbers.
- Medication Listing: Obtain a list of all available medications.
- Filtering and Searching: Filter medications by various criteria such as name, laboratory, active ingredients, and more.
- Human-Readable Data: Convert raw API responses into human-readable objects with descriptive methods and properties.
- Exception Handling: Handle HTTP exceptions that may occur during API requests.
- Robust Testing: Comprehensive unit tests ensure library functionality and robustness.
- Clean and Modern Code: Well-structured codebase following best practices for maintainability.

## Installation

Install the library using Composer:

```bash
composer require bluesourcery/cima-php-library
```
Still unreleased, use the repository in your composer.json:
```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Mazagu/cima-laravel-client.git"
        }
    ],
```
## How to Use
The CimaClient class allows you to interact with the CIMA API to retrieve medication information. Here are some examples of how to use its functionality.
### Finding a Medication
To retrieve detailed information about a specific medication by its registration number:
```php
use Bluesourcery\Cima\CimaClient;

$client = new CimaClient(new \GuzzleHttp\Client());
$medication = $client->find(1);

// Access medication properties
$registrationNumber = $medication->getRegistrationNumber();
$name = $medication->getName();
$activeIngredients = $medication->getActiveIngredients();
// ... other properties

// Convert medication to an array
$medicationArray = $medication->toArray();
```
### Listing All Medications
To retrieve a list of all medications:
```php
use Bluesourcery\Cima\CimaClient;

$client = new CimaClient(new \GuzzleHttp\Client());
$medicationList = $client->all();

foreach ($medicationList->medications as $medication) {
    // Access each medication's properties
}
```
Filtering and Searching Medications
You can filter and search medications based on various criteria:
```php
use Bluesourcery\Cima\CimaClient;

$client = new CimaClient(new \GuzzleHttp\Client());

// Example: Filter medications by name
$filteredMedicationList = $client->filterByName('paracetamol')->search();

// Example: Filter medications by laboratory
$filteredMedicationList = $client->filterByLaboratory('kern')->search();

// ... other filter methods available (as shown in the test cases)
```
### Working with Medication Properties
Each medication object returned by the CimaClient contains properties representing medication information. You can access these properties using getter methods:
```php
$medication = $client->find(1);

$registrationNumber = $medication->getRegistrationNumber();
$name = $medication->getName();
$activeIngredients = $medication->getActiveIngredients();
$laboratory = $medication->getLaboratory();
$prescription = $medication->getPrescription();
$status = $medication->getStatus()->getStatus(); // Human-readable status
$isCommercialized = $medication->isCommercialized();
```
### Searching with Filter Methods
You can combine filter methods with the search() method to retrieve a filtered list of medications:
```php
$client = new CimaClient(new \GuzzleHttp\Client());

// Filter by name and search
$filteredMedicationList = $client->filterByName('paracetamol')->search();

// Filter by laboratory and search
$filteredMedicationList = $client->filterByLaboratory('kern')->search();

// ... other filter methods available (as shown in the test cases)
```
### Exception Handling
The CimaClient can throw HttpException when an HTTP error occurs. You can catch and handle these exceptions:

If you'd like to contribute to this library, please follow these steps:
```php
use Bluesourcery\Cima\Exceptions\HttpException;

try {
    $medication = $client->find(1);
} catch (HttpException $exception) {
    // Handle the exception
}
```
## Contributing
1. Fork the repository.
2. Create a new branch: `git checkout -b my-feature-branch`.
3. Make your changes and commit them: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin my-feature-branch`.
5. Open a pull request.

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on the code of conduct, and the process for submitting pull requests.

## License

This project is licensed under the [GNU General Public License v3.0](LICENSE).
