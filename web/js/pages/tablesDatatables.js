/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave v.1, v.2 repris par Stéphane Bressani
 *  Description: Custom javascript code used in Tables Datatables page
 *               Permet de faire des recherches avec les 
 */

var TablesDatatables = function() 
{

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            $('#d06-datatable').dataTable({
                ajax: 'table_d06.json',
                columnDefs: [ { orderable: false, targets: [ 7 ] } ],
                pageLength: 10,
                lengthMenu: [[10, 20, 30, -1], [10, 20, 30, 'Tous']],
                stripeClasses:['stripe1','stripe2'],
                // Cette fonctionalité bug, je perd l'autre qui me permet de chercher
                //  "aoColumnDefs": [{
                //      "sType": "chinese-string",
                //      "aTargets": [1,2,3,4]
                //   }],
                oLanguage: 
                {
                    sInfo:              "<b>_START_-_END_</b> de <b>_TOTAL_</b>",
                    sProcessing:        "Traitement en cours...",
                    sLoadingRecords:    "Chargement en cours...",
                    sZeroRecords:       "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    sEmptyTable:        "Aucune donn&eacute;e disponible dans le tableau",
                }
            });

            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Rechercher');
            
            
            /**
             * Sorting in Javascript for Chinese Character. The Chinese Characters are
             * sorted on the radical and number of strokes. This plug-in performs sorting
             * for Chinese characters using the Javascript [localeCompare](https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/String/localeCompare)
             * function.
             *
             * Please note that `localeCompare` is not implemented in the same way in all
             * browsers, potentially leading to different results (particularly in IE).
             * 
             *  @name Chinese (string)
             *  @summary Sort Chinese characters
             *  @author [Patrik Lindström](http://www.lcube.se/sorting-chinese-characters-in-javascript/)
             *
             *  @example
             *    $('#example').dataTable( {
             *       columnDefs: [
             *         { type: 'chinese-string', targets: 0 }
             *       ]
             *    } );
             */

            jQuery.extend( jQuery.fn.dataTableExt.oSort, 
            {
                "chinese-string-asc" : function (s1, s2) 
                {
                    return s1.localeCompare(s2);
                },
                "chinese-string-desc" : function (s1, s2)
                {
                    return s2.localeCompare(s1);
                }
            } );
            

            jQuery.fn.DataTable.ext.type.search.string = function ( data ) 
            {
            return ! data ?
                '' :
                typeof data === 'string' ?
                    data
                        .replace( /έ/g, 'ε')
                        .replace( /ύ/g, 'υ')
                        .replace( /ό/g, 'ο')
                        .replace( /ώ/g, 'ω')
                        .replace( /ά/g, 'α')
                        .replace( /ί/g, 'ι')
                        .replace( /ή/g, 'η')
                        .replace( /\n/g, ' ' )
                        .replace( /[áÁ]/g, 'a' )
                        .replace( /[éÉ]/g, 'e' )
                        .replace( /[íÍ]/g, 'i' )
                        .replace( /[óÓ]/g, 'o' )
                        .replace( /[úÚ]/g, 'u' )
                        .replace( /ê/g, 'e' )
                        .replace( /î/g, 'i' )
                        .replace( /ô/g, 'o' )
                        .replace( /è/g, 'e' )
                        .replace( /ï/g, 'i' )
                        .replace( /ü/g, 'u' )
                        .replace( /ã/g, 'a' )
                        .replace( /õ/g, 'o' )
                        .replace( /ç/g, 'c' )
                        .replace( /ì/g, 'i' ) :
                    data;
            };

            // Option pour la recherche avec accent

            jQuery(document).ready(function() 
            {
                var table = jQuery('#d06-datatable').DataTable();

                // Remove accented character from search input as well
                $('.dataTables_filter input').keyup( function () 
                {
                    table
                        .search(
                          jQuery.fn.DataTable.ext.type.search.string( this.value )
                        )
                        .draw();
                });
            });
            
            
            
        }
    };
}();