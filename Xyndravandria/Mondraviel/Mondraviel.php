<?php
/*
=============================================================================================================================================
|   This file is part of a project released under the terms of the Xyndravandria PHP License (XyndravandriaPHPLicense.txt).                 |
|                                                                                                                                           |
|   You should be given a copy of the Xyndravandria PHP License (XyndravandriaPHPLicense.txt) within the same directory as the README.md;   |
|   if not, you can get a copy at http://Xyndravandria.ohost.de/XyndravandriaPHPLicense.txt .                                               |
|                                                                                                                                           |
|   The copyright (c) of this project is owned by Mauro Di Girolamo <maurodigirolamo@.web.de>.                                              |
============================================================================================================================================|



Xyndravandria Mondraviel
------------------------
Alpha 0.0.0

Xyndravandria is the name of a collection of projects designed and developed by Mauro Di Girolamo (maurodigirolamo@web.de); he is therefore the copyright (c) owner of Xyndravandria itself and all of its projects.

Xyndravandria Mondraviel is released under the terms of the Xyndravandria PHP License (XyndravandriaPHPLicense.txt). You should be given a copy of the Xyndravandria PHP License (XyndravandriaPHPLicense.txt) within the same directory as the README.md; if not, you can get a copy at http://Xyndravandria.ohost.de/XyndravandriaPHPLicense.txt . There might be a release under a freer license for a later, more stable version.

The documentation is either included in ./admin_media/Documentation/ or can be read at http://Xyndravandria.ohost.de/Mondraviel/Documentation/.

All projects:

   Xyndravandria Averazain
   http://github.com/MauroDiGirolamo/Xyndravandria_Averazain
   PHP
   Averazain is an Ajax framework supporting also JavaScript disabled clients perfectly - including search engines like Google.
   
   Xyndravandria Dyverath
   http://github.com/MauroDiGirolamo/Xyndravandria_Dyverath
   PHP
   Dyverath is a database access wrapper.
   
   Xyndravandria Erozaver
   http://github.com/MauroDiGirolamo/Xyndravandria_Erozaver
   PHP
   Erozaver is a class extending the type hinting given by the PHP engine (additional support for basic type hinting and size constraints).
   
   Xyndravandria Mondraviel
   http://github.com/MauroDiGirolamo/Xyndravandria_Mondraviel
   PHP
   Mondraviel is a class used to separate HTML from PHP code by firstly register models - files containing place holders embedded in HTML code - and then later fill them dynamically with content by passing values for the place holders.
*/

namespace Xyndravandria\Mondraviel;

/// The main class of Mondraviel.
/// @abstract
abstract class Mondraviel {
      
   /// The models registered to Mondraviel. @n
   /// Key = Identifier ; Value = File.
   /// <dl class = "return"><dt><b>%Type:</b></dt>
   /// <dd>array of string</dd></dl>
   /// @private 
   /// @static
   private static $Model;
   
   /// Registers a model to Mondraviel.
   /// @public
   /// @static
   /// @param string $File: The file to be registered as
   /// a model.
   /// @param string $ModelIdentifier: An identifier
   /// later used to access the model.
   /// @note $ModelIdentifier is an optional parameter. @n
   /// Its default value is 
   /// @verbatim \basename( $File ) @endverbatim.
   public static function RegisterModel( $File, $ModelIdentifier = '' ) {
      // TODO: Validate $ModelIdentifier.
      empty( $ModelIdentifier ) && $ModelIdentifier = \basename( $File ); // TODO: Other default value?
      if( isset( self::$Model[ $ModelIdentifier ] ) )
         throw new XyndravandriaMondravielException( 'A model with the identifier \'' . $ModelIdentifier . '\' already exists.' );
      elseif( ! \is_file( $File ) )
         throw new XyndravandriaMondravielException( 'File \'' . $File . '\' not found.' );
      else
         self::$Model[ $ModelIdentifier ] = $File;
      return;
   }
   
   /// Fills a model and returns the combined content.
   /// @public
   /// @static
   /// @param string $ModelIdentifier: The identifier of
   /// the model to be filled.
   /// @param array $Filling: The filling data as an
   /// array. @n
   /// [Place holder] => [the value to be inserted].
   /// @param boolean $IgnoreInexistentPlaceHolder:
   /// Whether value assigments for inexsitent place
   /// holders should be ignored or not. If not, an
   /// exception is thrown whenever a place holder in
   /// $Filling is not found in the model. Default value
   /// is false.
   /// @returns string
   /// @note $Filling and $IgnoreInexistentPlaceHolder
   /// are optional parameters.
   public static function FillModel( $ModelIdentifier, $Filling = array( ), $IgnoreInexistentPlaceHolder = false ) {
      $Content = '';
      if( ! isset( self::$Model[ $ModelIdentifier ] ) )
         throw new XyndravandriaMondravielException( 'A model with the identifier \'' . $ModelIdentifier . '\' does not exist.' );
      else {
         // TODO: Check again or _only_ here whether file exists?
         $Content = \file_get_contents( self::$Model[ $ModelIdentifier ] );
         foreach( $Filling as $PlaceHolder => $Value ) {
            if( \strpos( $Content, '$' . $PlaceHolder ) === false ) {
               if( ! $IgnoreInexistentPlaceHolder )
                  throw new XyndravandriaMondravielException( 'Place holder \'$' . $PlaceHolder . '\' not found in \'' . self::$Model[ $ModelIdentifier ] . '\'.' );
            } else 
               $Content = \str_replace( '$' . $PlaceHolder, $Value, $Content );
         }
      }
      return $Content;
   }
   
}
?>