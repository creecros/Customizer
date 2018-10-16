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
        return 'wikipage_id';
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
     * Get projectId from fileId
     *
     * @access public
     * @param  integer $file_id
     * @return integer
     */
    public function getProjectId($file_id)
    {
        return 1;
    }

    /**
     * Handle screenshot upload
     *
     * @access public
     * @param  integer  $wiki_id      Wiki id
     * @param  string   $blob         Base64 encoded image
     * @return bool|integer
     */
    public function uploadScreenshot($wiki_id, $blob)
    {
        $original_filename = e('Screenshot taken %s', $this->helper->dt->datetime(time())).'.png';
        return $this->uploadContent($wiki_id, $original_filename, $blob);
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
