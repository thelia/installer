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
        'module' => 'local/modules/{$name}/',
        'frontoffice-template' => 'templates/frontOffice/{$name}/',
        'backoffice-template' => 'templates/backOffice/{$name}/',
        'email-template' => 'templates/email/{$name}/',
    ];

    protected $supportedType = [
        'thelia-module',
        'thelia-frontoffice-template',
        'thelia-backoffice-template',
        'thelia-email-template'
    ];

    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {

        return $this->locations[$package->getType()] . $package->getPrettyName();

    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return in_array($packageType, $this->supportedType);
    }
} 