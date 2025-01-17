<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Model\Property\Predefined\Listing;

use Pimcore\Model;
use Pimcore\Model\Property;

/**
 * @internal
 *
 * @property \Pimcore\Model\Property\Predefined\Listing $model
 */
class Dao extends Model\Property\Predefined\Dao
{
    /**
     * Loads a list of predefined properties for the specicifies parameters, returns an array of Property\Predefined elements
     *
     * @return array
     */
    public function loadList()
    {
        $properties = [];

        foreach ($this->loadIdList() as $id) {
            $properties[] = Model\Property\Predefined::getById($id);
        }

        $this->model->setProperties($properties);

        return $properties;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return count($this->loadList());
    }
}
