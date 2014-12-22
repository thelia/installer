<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace Thelia\Composer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

/**
 * Class TheliaInstaller
 * @package Thelia\Composer
 * @author manuel raynaud <mraynaud@openstudio.fr>
 */
class TheliaInstaller extends LibraryInstaller
{
    protected $locations = [
        'thelia-module' => 'local/modules/',
        'thelia-frontoffice-template' => 'templates/frontOffice/',
        'thelia-backoffice-template' => 'templates/backOffice/',
        'thelia-email-template' => 'templates/email/',
        'thelia-pdf-template' => 'templates/pdf/',
        'thelia-local' => 'local/',
    ];

    public function getInstallPath(PackageInterface $package)
    {
        $type = $package->getType();
        if (!isset($this->locations[$package->getType()])) {
            throw new \InvalidArgumentException(sprintf('package type "%s" is not supported', $type));
        }

        $base = $this->locations[$type];

        $prettyName = $package->getPrettyName();
        if (strpos($prettyName, '/') !== false) {
            list($vendor, $name) = explode('/', $prettyName);
        } else {
            $vendor = '';
            $name = $prettyName;
        }

        $extra = $package->getExtra();
        if (!empty($extra['installer-name'])) {
            $name = $extra['installer-name'];
        }

        return $base . $name;
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return array_key_exists($packageType, $this->locations);
    }
}
