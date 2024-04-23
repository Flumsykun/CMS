
<p align="center">
  <h1 align="center"> <pre>
 ____    __       ____       
/\  _`\ /\ \     /\  _`\     
\ \ \L\_\ \ \    \ \ \L\ \   
 \ \ \L_L\ \ \  __\ \ ,  /   
  \ \ \/, \ \ \L\ \\ \ \\ \  
   \ \____/\ \____/ \ \_\ \_\
    \/___/  \/___/   \/_/\/ /
    </pre></h1>

  <p align="center">
     voor GLR by: 085942
    <br/>
    <br/>
  </p>
  
 ### 
 
<div align="center">
  <img src="https://cdn.simpleicons.org/laravel/FF2D20" height="40" alt="laravel logo"  />
  <img width="15" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tailwindcss/tailwindcss-original.svg" height="40" alt="tailwind logo" />  
  <img width="15" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/livewire/livewire-original-wordmark.svg" height="40" alt="livewire logo" />
  <img width="15" />
  <img src="https://ih1.redbubble.net/image.2428884987.0603/st,small,507x507-pad,600x600,f8f8f8.u3.jpg" height="40" alt="jetstream logo"/>
  <img width="15" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/docker/docker-plain.svg" height="40" alt="docker logo"/>
  <img width="15" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/phpstorm/phpstorm-original.svg" height="40" alt="phpstorm logo"  />
  <img width="15" />

</div>

  ###




## Table Of Contents

* [About the Project](#about-the-project)
* [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Usage](#usage)
* [Contributing](#contributing)
* [Author](#author)

## About The Project

Dit is mijn laatste project voor het GLR, het is een eigengemaakte CMS examen project met volledige documentatie.

## Built With

- **Laravel**: Fast, efficient PHP framework for web development.
- **Blade**: Simple, powerful templating engine for Laravel.
- **Tailwind CSS**: Utility-first CSS framework for rapid styling.
- **Jetstream**: Streamlines user authentication and team management.
- **Livewire**: Simplifies building dynamic interfaces without JavaScript.
- **Sail**: Docker development environment for Laravel projects.


* [**Laravel**](https://laravel.com/)
* [**Blade**](https://laravel.com/docs/10.x/blade)
* [**Tailwind CSS**](https://tailwindui.com/)
* [**Jetstream**](https://jetstream.laravel.com/introduction.html)
* [**Livewire**](https://laravel-livewire.com/)
* [**Sail**](https://laravel.com/docs/10.x/sail)

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

## Author

* **Flumsykun** - *GLR Student* - [Flumsykun](https://github.com/Flumsykun/) - *Made this entire thing with alot of caffeine!*
