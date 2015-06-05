module.exports = function(grunt) {

    'use strict';

    // Time how long it takes to do the Grunt build
    require('time-grunt')(grunt);

    /**********************
     * Grunt configuration
     **********************/
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        /**
         * Delete files
         * @see: https://www.npmjs.com/package/grunt-contrib-clean
         */
        clean: {
            // Clean out the temporary build directory
            js: ['staging', 'dist']
        },

        /**
         * Sass -> CSS compiler
         * @see: https://www.npmjs.com/package/grunt-contrib-compass
         */
        compass: {
            dist: {
                options: {
                    bundleExec: true,
                    config: 'compass.rb',
                    force: true,
                    trace: true
                }
            }
        },

        /**
         * Complexity reports
         * @see: https://www.npmjs.com/package/grunt-complexity
         */
        complexity: {
            src: [
                // CB modules
                'js-src/**/*.js'
            ],
            options: {
                breakOnErrors: false, // someday switch this to true when we have time to refactor our more complicated files
                errorsOnly: false,
                cyclomatic: 5,
                halstead: 13,
                maintainability: 90
            }
        },

        /**
         * Compress files into an archive file
         * @see: https://www.npmjs.com/package/grunt-contrib-compress
         */
        compress: {
            options: {
                archive: 'uplift.' + Date.now() + '.zip',
                mode: 'zip',
                pretty: true
            },
            main: {
                expand: true,
                cwd: 'dist/',
                src: ['**/*'],
                dest: '/'
            }
        },

        /**
         * Files to concatenate together
         * @see: https://www.npmjs.com/package/grunt-contrib-concat
         */
        concat: {
            options: {
                // define a string to put between each file in the concatenated output
                separator: ';'
            },

            // Append loading shim to end of js-build/kimbia.js (which... is hopefully built at this point in the build)
            js: {
                src: [
                    'js-vendor/modernizr.js',
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/jquery-throttle-debounce/jquery.ba-throttle-debounce.js',
                    'bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
                    'js-src/navbar-squisher.js',
                    'js-src/site.js'
                ],
                // the location of the resulting JS file (which is indeed the same as the first file in the src's)
                dest: 'staging/uplift.js'
            }

        },

        /**
         * Copy files
         * @see: https://www.npmjs.com/package/grunt-contrib-copy
         */
        copy: {
            main: {
                files: [
                    {
                        dest: 'dist/',
                        expand: true,
                        src: ['*.php', 'external/**', 'parts/**', 'style.css', 'js/site.js', 'css/**', 'fonts/**', 'img/**']
                    }
                ]
            }
        },

        /**
         * Avoid syntax / murky stylistic problems in our JS
         * @see https://www.npmjs.com/package/grunt-contrib-jshint
         */
        jshint: {
            options: {
                es3: true, // complain about trailing commas, etc
                bitwise: true,
                browser: true,
                curly: true,
                eqeqeq: true,
                nonbsp: true,
                nonew: true,
                strict: true,
                trailing: true,
                devel: false,
                globals: {
                    require: true,
                    define: true
                }
            },

            all: [
                // This file
                'Gruntfile.js',

                // Node packages file
                'package.json',

                // Bower files
                '.bowerrc',
                'bower.json',

                // Custom JS
                'js-src/**/*.js'

            ]

        },

        /*
         * Uglify optimizer / minifier
         * @see https://www.npmjs.com/package/grunt-contrib-uglify
         */
        uglify: {
            options: {
                compress: {}
            },
            js: {
                files: {
                    'dist/uplift.min.js': ['staging/uplift.js']
                }
            }
        },

        /*
         * Monitor certain files and re-build / re-test things as appropriate
         * @see https://www.npmjs.com/package/grunt-contrib-watch
         */
        watch: {
            grunt: {
                files: [
                    'Gruntfile.js',
                    'package.json',
                    'bower.json'
                ],
                tasks: 'build-js'
            },
            javascript: {
                files: [
                    'js-src/**/*.js'
                ],
                tasks: 'build-js'
            }
        }
    });



    /*********************************
     * Register various grunt plugins
     *********************************/
    // Measure the complexity of our JS
    grunt.loadNpmTasks('grunt-complexity');

    // Clean directories
    grunt.loadNpmTasks('grunt-contrib-clean');

    // Compile Sass -> CSS using Compass
    grunt.loadNpmTasks('grunt-contrib-compass');

    // Compress files into .gzip or .zip archives
    grunt.loadNpmTasks('grunt-contrib-compress');
    // Concatenate files
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Copy files
    grunt.loadNpmTasks('grunt-contrib-copy');

    // JavaScript linter
    grunt.loadNpmTasks('grunt-contrib-jshint');

    // Minify JavaScript with Uglify
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Watch files for changes
    grunt.loadNpmTasks('grunt-contrib-watch');




    /********
     * Tasks
     ********/

    /**
     * Task: Build JavaScript
     *  - Clean the staging and dist directories
     */
    grunt.registerTask('build-js', ['clean:js', 'concat', 'uglify']);

    /**
     * Task: Build
     *  - Build JavaScript
     *  - Compile Sass -> CSS
     *  - Copy files
     *  - Zip files up
     */

    grunt.registerTask('build', ['build-js', 'compass', 'copy', 'compress']);

    /**
     * Task: Default
     *  - Test
     *  - Build
     */
    grunt.registerTask('default', ['test', 'build']);

    /**
     * Task: Test JavaScript files
     *   - Check syntax with JSHint
     *   - Measure code complexity
     */
    grunt.registerTask('test', ['jshint', 'complexity']);

};
