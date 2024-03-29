<?php

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CodeIgniter\HTTP;

/**
 * Expected behavior of an HTTP request
 *
 * @mixin \CodeIgniter\HTTP\IncomingRequest
 * @mixin \CodeIgniter\HTTP\CLIRequest
 * @mixin \CodeIgniter\HTTP\CURLRequest
 */
interface RequestInterface
{
    /**
     * Gets the user's IP address.
     * Supplied by RequestTrait.
     *
     * @return string IP address
     */
    public function getIPAddress(): string;

    //--------------------------------------------------------------------

    /**
     * Validate an IP address
     *
     * @param string $ip    IP Address
     * @param string $which IP protocol: 'ipv4' or 'ipv6'
     *
     * @return boolean
     *
     * @deprecated Use Validation instead
     */
    public function isValidIP(string $ip, string $which = NULL): bool;

    //--------------------------------------------------------------------

    /**
     * Get the request method.
     * An extension of PSR-7's getMethod to allow casing.
     *
     * @param boolean $upper Whether to return in upper or lower case.
     *
     * @return string
     *
     * @deprecated The $upper functionality will be removed and this will revert to its PSR-7 equivalent
     */
    public function getMethod(bool $upper = FALSE): string;

    //--------------------------------------------------------------------

    /**
     * Fetch an item from the $_SERVER array.
     * Supplied by RequestTrait.
     *
     * @param  string $index  Index for item to be fetched from $_SERVER
     * @param  null   $filter A filter name to be applied
     * @return mixed
     */
    public function getServer($index = NULL, $filter = NULL);

    //--------------------------------------------------------------------
}
