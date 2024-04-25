# Integração Laravel com Keycloak

Este projeto é um exemplo de integração do framework Laravel com o Keycloak para autenticação de usuários. O Keycloak é usado como servidor de autenticação e autorização para gerenciar e autenticar usuários.

## Requisitos

- Docker
- Docker Compose (opcional para configuração mais complexa)
- PHP >= 8.2
- Composer

## Configuração Inicial
```
git clone https://seu-repositorio-aqui.git
cd nome-do-seu-projeto
composer install
cp .env.example .env
php artisan key:generate
```
Preencha as seguintes variáveis no arquivo *.env* com os detalhes específicos do seu servidor Keycloak:
```
KEYCLOAK_CLIENT_ID="seu-client-id-aqui"
KEYCLOAK_CLIENT_SECRET="seu-client-secret-aqui"
KEYCLOAK_REDIRECT_URI="http://localhost:8000/callback"
KEYCLOAK_BASE_URL="http://localhost:8080/auth"
KEYCLOAK_REALM="seu-realm-aqui"
```

### Configuração do Keycloak
Para configurar e executar o Keycloak localmente via Docker, utilize o seguinte comando:

```bash
docker run -p 8080:8080 -e KEYCLOAK_ADMIN=admin -e KEYCLOAK_ADMIN_PASSWORD=admin quay.io/keycloak/keycloak:24.0.3 start-dev
```

### Executar o projeto
```bash
php artisan serve
```
Agora, você pode acessar sua aplicação Laravel em http://localhost:8000 e iniciar o processo de autenticação via Keycloak.


### Notas Adicionais
- Certifique-se de que as portas usadas (`8080` para Keycloak e `8000` para Laravel) estejam livres ou ajuste-as conforme necessário.
- Ajuste a URL do `KEYCLOAK_REDIRECT_URI` de acordo com o seu ambiente e configuração do servidor web, se diferente de `http://localhost:8000/callback`.
- Este README assume que você já tem um arquivo `.env.example` com todas as variáveis de configuração padrão que sua aplicação necessita, incluindo as específicas para Keycloak.

Este guia README deve fornecer uma base sólida para qualquer desenvolvedor que precise executar e configurar sua aplicação Laravel com autenticação via Keycloak.
