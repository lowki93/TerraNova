set :domain, "frontapp0.demo.infra.universcine.com"
set :symfony_env_prod, "prod"

set :deploy_to, "/home/frontoffice/instances/kbudain-wipo"

role :web, domain
role :app, domain
role :db, domain, :primary => true