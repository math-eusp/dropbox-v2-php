<?php
    /**
     * Copyright (c) 2016 Alorel, https://github.com/Alorel
     * Licenced under MIT: https://github.com/Alorel/dropbox-v2-php/blob/master/LICENSE
     */

    namespace Alorel\Dropbox\Operation\Sharing;

    use Alorel\Dropbox\OperationKind\RPCOperation;
    use Alorel\Dropbox\Options\Builder\ShareFolderOptions;

    /**
     * Share a folder with collaborators. Most sharing will be completed synchronously. Large folders will be
     * completed asynchronously
     *
     * @author Art <a.molcanovas@gmail.com>
     */
    class ShareFolder extends RPCOperation {

        /**
         * Perform the operation, returning a promise or raw response object
         *
         * @author Art <a.molcanovas@gmail.com>
         *
         * @param string                  $path    Path to the folder
         * @param ShareFolderOptions|null $options Optional parameters
         *
         * @return \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface The promise interface if
         *                                                                                  async is set to true and the
         *                                                                                  request interface if it is
         *                                                                                  set to false
         * @throws \GuzzleHttp\Exception\ClientException
         */
        function raw($path, ShareFolderOptions $options = null) {
            return $this->send(
                'sharing/share_folder',
                $path,
                $options
            );
        }
    }