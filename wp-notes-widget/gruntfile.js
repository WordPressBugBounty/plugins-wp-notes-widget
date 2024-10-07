module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    less: {
      development: {
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2
        },
        files: {
          "public/css/wp-notes-public.css": "public/less/wp-notes-public.less",
          "admin/css/wp-notes-admin.css": "admin/less/wp-notes-admin.less"
        }
      }
    },
    watch: {
      styles: {
        files: ['**/less/*.less'], // which files to watch
        tasks: ['less'],
        options: {
          nospawn: true
        }
      }
    },
    pot: {
        options:{
        text_domain: 'wp-notes-widget', //Your text domain. Produces my-text-domain.pot
        dest: 'languages/', //directory to place the pot file
        keywords: ['gettext', '__', '_e'], //functions to look for
      },
      files:{
        src:  [ '**/*.php' ], //Parse all php files
        expand: true,
      }
    }

  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-pot');
  // Default task(s).
  grunt.registerTask('default', ['less', 'watch']);

};