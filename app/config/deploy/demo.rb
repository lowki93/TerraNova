set :domain, "178.32.221.32"
set :symfony_env_prod, "prod"

set :deploy_to, "/home/lowki/instances/wipo"

role :web, domain
role :app, domain
role :db, domain, :primary => true