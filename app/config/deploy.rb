set :stage_dir, 'app/config/deploy'

require 'capistrano/ext/multistage'

set :stages, %w(prod demo)

set :application, "Wipo"
set :app_path,    "app"
set :user, "frontoffice"

set :repository,  ".git"
set :scm,         :git

set :deploy_via, :rsync_with_remote_cache

set :assets_symlink, true
set :model_manager, "doctrine"
set :use_sudo, false
set :keep_releases,  3

set :shared_files, ["app/config/parameters.yml"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", "vendor"]
set :use_composer, true
set :dump_assetic_assets, true

set :php_bin, "php -d apc.enable_cli=0"

# Be more verbose by uncommenting the following line
logger.level = Logger::INFO