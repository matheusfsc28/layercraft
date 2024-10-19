## Langs

- [PT-BR 🇧🇷](#layercraft_pt)
- [EN-US 🇺🇸](#layercraft_en)

# LayerCraft_PT

LayerCraft é um pacote para gerar uma arquitetura em camadas (Controller, Service, Interface, Repository, Model) em aplicações Laravel. Ele facilita a organização do código e promove boas práticas de desenvolvimento de maneira ágil.

## Instalação

Você pode instalar o pacote via Composer. Execute o seguinte comando no seu terminal:

```bash
composer require matheusfsc28/layercraft
```

## Como usar

No seu terminal, na pasta do seu projeto Laravel, execute o seguinte comando:

```bash
php artisan layercraft <YourClassName>
```

Isso criará a seguinte estrutura no projeto:

```bash
/seu-projeto
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── <YourClassName>Controller.php
│   ├── Interfaces/
│   │   └── <YourClassName>Interface.php
│   ├── Models/
│   │   └── <YourClassName>.php
│   ├── Repositories/
│   │   └── <YourClassName>Repository.php
│   └── Services/
│       └── <YourClassName>Service.php
```

Você também pode criar suas subpastas para manter a organização de acordo com suas necessidades:

```bash
php artisan layercraft <YourSubFolder>\<YourClassName>
```

A estrutura ficará da seguinte maneira:

```bash
/seu-projeto
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── <YourSubFolder>/
│   │           └── <YourClassName>Controller.php
│   ├── Interfaces/
│   │   └── <YourSubFolder>/
│   │       └── <YourClassName>Interface.php
│   ├── Models/
│   │   └── <YourSubFolder>/
│   │       └── <YourClassName>.php
│   ├── Repositories/
│   │   └── <YourSubFolder>/
│   │       └── <YourClassName>Repository.php
│   └── Services/
│       └── <YourSubFolder>/
│           └── <YourClassName>Service.php
```

### Estrutura Detalhada

- **Controllers**: Contém a lógica do controlador.
- **Interfaces**: Define a interface que o repositório deve implementar.
- **Models**: Representa a entidade no banco de dados.
- **Repositories**: Contém a lógica de acesso a dados.
- **Services**: Implementa a lógica de negócios.

## Licença

Este projeto está licenciado sob a Licença MIT. Veja o arquivo LICENSE para mais detalhes.

## Contato

Se você tiver dúvidas ou sugestões, entre em contato:

- **Nome**: Matheus Felipe
- **Email**: <dev.matheusfelipe@gmail.com>
- **GitHub**: [![GitHub](https://img.shields.io/badge/GitHub-matheusfsc28-blue?style=flat-square)](https://github.com/matheusfsc28)
- **LinkedIn**: [![LinkedIn](https://img.shields.io/badge/LinkedIn-matheusfsc28-blue?style=flat-square)](https://www.linkedin.com/in/matheusfsc28)

#

# LayerCraft_EN

LayerCraft is a package to generate a layered architecture (Controller, Service, Interface, Repository, Model) in Laravel applications. It helps organize the code and promotes good development practices in an agile way.

## Installation

You can install the package via Composer. Run the following command in your terminal:

```bash
composer require matheusfsc28/layercraft
```

## How to use

In your terminal in the root of your Laravel project, run the following command:

```bash
php artisan layercraft <YourClassName>
```

This will create the following structure in the project:

```bash
/your-project
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── <YourClassName>Controller.php
│   ├── Interfaces/
│   │   └── <YourClassName>Interface.php
│   ├── Models/
│   │   └── <YourClassName>.php
│   ├── Repositories/
│   │   └── <YourClassName>Repository.php
│   └── Services/
│       └── <YourClassName>Service.php
```

You can also create your subfolders to keep according to your organization:

```bash
php artisan layercraft <YourSubFolder>\<YourClassName>
```

The structure will be as follows:

```bash
/your-project
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── <YourSubFolder>/
│   │           └── <YourClassName>Controller.php
│   ├── Interfaces/
│   │   └── <YourSubFolder>/
│   │       └── <YourClassName>Interface.php
│   ├── Models/
│   │   └── <YourSubFolder>/
│   │       └── <YourClassName>.php
│   ├── Repositories/
│   │   └── <YourSubFolder>/
│   │       └── <YourClassName>Repository.php
│   └── Services/
│       └── <YourSubFolder>/
│           └── <YourClassName>Service.php
```

## Detailed Structure

- **Controllers**: Contains the controller logic.
- **Interfaces**: Defines the interface that the repository must implement.
- **Models**: Represents the entity in the database.
- **Repositories**: Contains the data access logic.
- **Services**: Implements the business logic.

## Contato

If you have any questions or suggestions, please contact:

- **Name**: Matheus Felipe
- **Email**: <dev.matheusfelipe@gmail.com>
- **GitHub**: [![GitHub](https://img.shields.io/badge/GitHub-matheusfsc28-blue?style=flat-square)](https://github.com/matheusfsc28)
- **LinkedIn**: [![LinkedIn](https://img.shields.io/badge/LinkedIn-matheusfsc28-blue?style=flat-square)](https://www.linkedin.com/in/matheusfsc28)

#
