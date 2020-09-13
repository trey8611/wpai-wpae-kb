First, make sure to back-up your database. Then use a tool like phpMyAdmin to delete the following out of the database:

1. All tables that start with 'pmxi_' and the 'pmlca_links' table
2. All tables that start with 'pmxe_'
3. All options that start with '\_wp_all_import', 'wp_all_import, '\_wp_all_export', 'wp_all_export', 'wpai-', 'wpae-', 'pmxe_', 'pmxi_'

Through SFTP, delete the following folders:

1. /wp-content/uploads/wpallimport/*
2. /wp-content/uploads/wpallexport/*
