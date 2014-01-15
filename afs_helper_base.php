<?php
require_once "afs_helper_format.php";

/** @brief Add @e magic so that getter methods can be called the same way as
 * properties. */
abstract class AfsHelperBase
{
    /** @brief Simple property helper.
     *
     * Convenient way to access <tt>get_XXX</tt> methods through property call.
     *
     * @param $name [in] name of the required property.
     * @return value of the property.
     */
    public function __get($name)
    {
        $getter = 'get_' . $name;
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }
    }

    protected function check_format($format)
    {
        if (! AfsHelperFormat::is_valid_value($format)) {
            throw new InvalidArgumentException('Helper format parameter should '
                . 'be set to \'AfsHelperFormat::HELPERS\' or '
                . '\'AfsHelperFormat::ARRAYS\'; not: ' . $format);
        }
    }
}

?>
