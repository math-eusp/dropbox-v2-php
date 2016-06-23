<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Sharing;

    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Builder\AddFileMemberOptions;
    use Alorel\Dropbox\Parameters\Collections\MemberSelectors;

    /**
     * Adds specified members to a file.
     *
     * @author Art <a.molcanovas@gmail.com>
     * @see    https://www.dropbox.com/developers/documentation/http/documentation#sharing-add_file_member
     */
    class AddFileMember extends RPCOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                    $file    File to which to add members.
         * @param MemberSelectors           $members Members to add. Note that even an email address is given, this
         *                                           may result in a user being directy added to the membership if
         *                                           that email is the user's main account email.
         * @param AddFileMemberOptions|null $options Optional parameters
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw($file, MemberSelectors $members, AddFileMemberOptions $options = null) {
            return $this->send(
                'sharing/add_file_member',
                [
                    'file'    => $file,
                    'members' => $members
                ],
                $options
            );
        }
    }