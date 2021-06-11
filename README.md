## Como configurar esta aplicação
- Executar todos os comandos descritos a seguir na raiz do projeto.
- Fazer uma cópia do arquivo .env.example e renomeá-lo para .env
- Configurar no .env o serviço de email
- Instalar/Executar o composer
- Instalar e executar npm


#### Para configurar o serviço de email siga as intruções dos links abaixo:
    - (Serviço de email recomendado para testes - mailtrap)
    - Caso tenha outro serviço de email já configurado então pule esta etapa
    
    - Faça cadastro/login no site do Mailtrap (https://mailtrap.io/)
    - Siga as intruções para configuração do Mailtrap (https://www.itsolutionstuff.com/post/laravel-send-mail-using-mailtrap-exampleexample.html) - 
        realizar somente o procedimento do Step 1
    - Atualizar o arquivo .env com as credenciais de acesso do Mailtrap  

### Instalando o composer
    - composer install -vvv

### Instalando npm
    - npm install && npm rum prod

### Caso apareça informando que o Vue não esteja instalado, executar os eguinte comandos:
    - npm install vue
    - npm install vue-template-compiler vue-loader@^15.9.5 --save-dev --legacy-peer-deps
    - npm rum prod

### Para testar se esta tudo funcionando execute o seguinte comando:
    - php artisan serve
    - acesse a url http://127.0.0.1:8000/ para validar se a aplicação foi configurada corretamente.


#### Caso o envio de email apresente alguma mensagem genérica, consulte o log do laravel para verificar se houve algum erro ou falha na conexão com o serviço de email.
