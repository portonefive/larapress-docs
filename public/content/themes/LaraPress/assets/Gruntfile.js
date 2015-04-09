module.exports = function (grunt)
{
    grunt.initConfig(
        {
            pkg: grunt.file.readJSON('package.json'),

            sass: {
                options: {
                    includePaths: ['vendor/foundation/scss']
                },
                dist: {
                    options: {
                        outputStyle: 'compact'
                    },
                    files: {
                        'css/style.css': 'scss/style.scss'
                    }
                }
            },

            watch: {
                grunt: {files: ['Gruntfile.js']},

                sass: {
                    files: 'scss/**/*.scss',
                    tasks: ['sass']
                }
            }
        }
    );

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('build', ['sass']);
    grunt.registerTask('default',
        [
            'build',
            'watch'
        ]
    );
};