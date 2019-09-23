<?php
/**
 * Magecom
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magecom.net so we can send you a copy immediately.
 *
 * @category Magecom
 * @package Magecom_Migration
 * @copyright Copyright (c) 2019 Magecom, Inc. (http://www.magecom.net)
 * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magecom\Migration\Model;

use Migration\ResourceModel\Record;
use Migration\Handler\AbstractHandler;
use Migration\Handler\HandlerInterface;

/**
 * Class Suffix
 *
 * @category Magecom
 * @package Magecom_Migration
 * @author Eugene Bogdanov
 */
class SuffixAdd extends AbstractHandler implements HandlerInterface
{
    /**
     * @var string
     */
    protected $suffix;

    /**
     * AddSuffix constructor.
     * @param string $suffix
     */
    public function __construct($suffix)
    {
        $this->suffix = $suffix;
    }


    /**
     * Field name for add custom suffix.
     */
    const FIELD_NAME_FOR_ADD_SUFFIX = 'modify_content';

    /**
     * Add suffix to field value
     *
     * @param Record $recordToHandle
     * @param Record $oppositeRecord
     * @return mixed|void
     * @throws \Migration\Exception
     */
    public function handle(Record $recordToHandle, Record $oppositeRecord)
    {
        $this->validate($recordToHandle);
        if ($this->field && $this->field === self::FIELD_NAME_FOR_ADD_SUFFIX) {
            if ($value = $recordToHandle->getValue(self::FIELD_NAME_FOR_ADD_SUFFIX)) {
                $recordToHandle->setValue(self::FIELD_NAME_FOR_ADD_SUFFIX, $value . $this->suffix);
            }
        }
    }
}
