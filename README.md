# Branching

## Quick Legend

<table>
  <thead>
    <tr>
      <th>Instance</th>
      <th>Branch</th>
      <th>Description, Instructions, Notes</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Stable</td>
      <td>stable</td>
      <td>Accepts merges from Working and Hotfixes</td>
    </tr>
    <tr>
      <td>Working</td>
      <td>develop</td>
      <td>Accepts merges from Features/Issues and Hotfixes</td>
    </tr>
    <tr>
      <td>Features/Issues</td>
      <td>topic-*</td>
      <td>Always branch off HEAD of Working</td>
    </tr>
    <tr>
      <td>Hotfix</td>
      <td>hotfix-*</td>
      <td>Always branch off Stable</td>
    </tr>
      <tr>
          <td>Testing</td>
          <td>tests</td>
          <td>For Unit/Feature tests</td>
      </tr>
  </tbody>
</table>


## Table Of Contents

* [Getting Started](#getting-started)
* [Prerequisites](#prerequisites)
* [Installation](#installation)
* [Usage](#usage)

## Getting Started
> [!IMPORTANT]
>Depending on if you are using Docker or not some steps can be skipped. Download or Clone this repo and excute the following commands below:

### Prerequisites

> [!TIP]
>  ## Sail vim alias command
> 
> ```bash
> nano ~/.zshrc
> ```
>```shell
>alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
>```
>**restart the terminal**
>```bash
> sail up -d
> ```

This is an example of how to list things you need to use the software and how to install them.

> [!IMPORTANT]
> ### List of all commands for easy acsess:
> 
> ```bash
>  git clone https://github.com/your-username/exam-project.git
> ```
> ```bash
>  cd /path/to/exam-project
> ```
> ```bash
>  cp .env.example .env
> ```
> ```bash
>  composer install --ignore-platform-reqs
> ```
> ```bash
>  sail up -d
> ```
> ```bash
>  sail composer install
> ```
> ```bash
>  sail artisan key:generate
> ```
> ```bash
>  sail artisan storage:link
> ```
> ```bash
>  sail artisan migrate:fresh --seed
> ```
> ```bash
>  sail npm install
> ```
> ```bash
>  sail npm run dev
> ```
> ```bash
>  sail npm run build
> ```

> [!WARNING]
> If you do not use sail please use these commands below:
>```bash
> composer install
>```
>```bash
>php artisan key:generate
>```
>```bash
> php artisan storage:link
> ```
> ```bash
> php artisan migrate:fresh --seed
>```
>```bash
> npm install
> ```
> ```bash
> npm run dev
> ```
> ```bash
> npm run build
> ```
> ```bash
> php artisan serve
> ```

#### Docker Installation (For Laravel Sail)
Ensure you have Docker installed on your system. You can download and install Docker Desktop from https://www.docker.com/products/docker-desktop.

##### Install Laravel Sail globally using Composer:

```bash
composer require laravel/sail --dev
```
##### Initialize Laravel Sail within your Laravel project:

```bash
php artisan sail:install
```
##### Start the Docker containers:

```bash
sail up -d
```

You can now proceed with the steps under **"Usage"** to set up and run your Laravel project.

### Installation

 **-Clone the repo**

```bash
git clone  https://github.com/Flumsykun/Examen.git
```
*-Or install and extract the ZIP*

**-Install NPM packages**

```bash
sail npm install
```
**-If Laravel Sail is not installed**

```bash
composer require laravel/sail --dev
 ```

**-Create a .env file by coping .env.example**

```bash
cp .env.example .env
```

**-Generate a application key**
```bash
php artisan key:generate
```

> [!NOTE]
> For Docker after copying env.example

**-Start the docker server**
```bash
sail up -d
```
*Alternatively, you can use the following command if Sail is not installed globally:*

```bash
./vendor/bin/sail up -d
```

You can now proceed with the steps under **"Usage"** to set up and run your Laravel project.

## Usage

##### Connect to the database using a database management tool like Sequel Ace or PHPMyAdmin, 

###### Then run the database migrations and seed the database.
###### **Run the following commands in your terminal:**

```bash
sail artisan migrate:fresh --seed
```

**Build the project asssets for development**

```bash
sail artisan npm run dev
```


**Or for production**

```bash
sail artisan npm run build
```
> [!CAUTION]
>(without docker) run the commands without sail,
> 
>**Not ❌**
> ```bash
> sail up -d
>```
>**instead ✅**
>```bash
>php artisan serve
>``` 

