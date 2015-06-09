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
            // Clean out the dist directory
            // ModerizR gets custom built each time to for account for CSS Development
            js: ['staging', 'dist', 'js-src/modernizr-custom.js']
        },

        /**
         * Sass -> CSS compiler
         * @see: https://www.npmjs.com/package/grunt-contrib-compass
         */
        compass: {
            dev: {
                options: {
                    //bundleExec: true,
                    config: 'compass.rb',
                    force: true,
                    trace: true
                }
            },

            dist: {
                options: {
                    //bundleExec: true,
                    config: 'config.rb',
                    // Overwrite :expanded from config.rb for Distribution Build
                    outputStyle: 'compressed',
                    // Remove line comments for Distribution Build
                    noLineComments: true,
                    force: true,
                    trace: true
                }
            }
        },

        modernizr: {
            dist: {
                // [REQUIRED] Path to the build you're using for development.
                "devFile" : "bower_components/modernizr/modernizr.js",

                // Path to save out the built file.
                "outputFile" : "js-src/modernizr-custom.js",

                // Based on default settings on http://modernizr.com/download/
                "extra" : {
                    "shiv" : true,
                    "printshiv" : false,
                    "load" : true,
                    "mq" : false,
                    "cssclasses" : true
                },

                // Based on default settings on http://modernizr.com/download/
                "extensibility" : {
                    "addtest" : false,
                    "prefixed" : false,
                    "teststyles" : false,
                    "testprops" : false,
                    "testallprops" : false,
                    "hasevents" : false,
                    "prefixes" : false,
                    "domprefixes" : false,
                    "cssclassprefix": ""
                },

                // By default, source is uglified before saving
                "uglify" : false,

                // Define any tests you want to implicitly include.
                "tests" : ['forms-placeholder'],

                // By default, this task will crawl your project for references to Modernizr tests.
                // Set to false to disable.
                "parseFiles" : true,

                // When parseFiles = true, matchCommunityTests = true will attempt to
                // match user-contributed tests.
                "matchCommunityTests" : true,

                // Have custom Modernizr tests? Add paths to their location here.
                "customTests" : ['noncore-tests/forms-placeholder.js']
            }
        },

        /**
         * Avoid syntax / murky stylistic problems in our JS
         * @see https://www.npmjs.com/package/grunt-contrib-jshint
         */
        jshint: {
            options: {
                reporter: require('jshint-stylish'),
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
         * Files to concatenate together
         * @see: https://www.npmjs.com/package/grunt-contrib-concat
         */
        concat: {
            options: {
                // define a string to put between each file in the concatenated output
                separator: ';'
            },

            js: {
                src: [
                    'bower_components/jquery/dist/jquery.js',
                    'bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
                    'js-src/offcanvas.js',
                    'js-src/site.js',
                    'js-src/modernizr-custom.js'
                ],
                // the location of the resulting JS file (which is indeed the same as the first file in the src's)
                dest: 'staging/uplift.js'
            }
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
                    'js/uplift.min.js': ['staging/uplift.js']
                }
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
                        src: ['*.php', 'external/**', 'parts/**', 'style.css', 'js/**', 'css/**', 'fonts/**', 'img/**']
                    }
                ]
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

    // Build ModernizR file from project's assets
    grunt.loadNpmTasks('grunt-modernizr');

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
    grunt.registerTask('build-js', ['clean:js', 'modernizr', 'concat', 'uglify']);

    /**
     * Task: Build
     *  - Build JavaScript
     *  - Compile Sass -> CSS
     *  - Copy files
     *  - Zip files up
     */

    grunt.registerTask('build', ['build-js', 'compass:dist', 'copy', 'compress']);

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
