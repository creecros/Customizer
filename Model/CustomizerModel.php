<?php

namespace Kanboard\Plugin\Customizer\Model;

use Kanboard\Model\FileModel;

/**
 * Customizer File Model
 *
 * @package  Customizer\Model
 * @author   creecros
 */
class CustomizerFileModel extends FileModel
{
    /**
     * Table name
     *
     * @var string
     */
    const TABLE = 'customizer_files';
    
     /**
     * Events
     *
     * @var string
     */
    const EVENT_CREATE = 'custom.file.create';
   

    /**
     * Get the table
     *
     * @abstract
     * @access protected
     * @return string
     */
    protected function getTable()
    {
        return self::TABLE;
    }
    

    /**
     * Define the foreign key
     *
     * @abstract
     * @access protected
     * @return string
     */
    protected function getForeignKey()
    {
        return 'custom_id';
    }

    /**
     * Define the path prefix
     *
     * @abstract
     * @access protected
     * @return string
     */
    protected function getPathPrefix()
    {
        return 'customizer';
    }

    /**
     * Handle screenshot upload
     *
     * @access public
     * @param  integer  $wiki_id      Wiki id
     * @param  string   $blob         Base64 encoded image
     * @return bool|integer
     */
    public function uploadScreenshot($custom_id, $blob)
    {
        $original_filename = e('Screenshot taken %s', $this->helper->dt->datetime(time())).'.png';
        return $this->uploadContent($custom_id, $original_filename, $blob);
    }

    /**
     * Fire file creation event
     *
     * @access protected
     * @param  integer $file_id
     */
    protected function fireCreationEvent($file_id)
    {
        return null;
    }
    
}
