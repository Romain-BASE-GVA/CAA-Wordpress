<?php

namespace OTGS\Toolset\Types\Filesystem;

use Toolset_Filesystem_Exception;

class File {

	/** @var bool|resource */
	private $handle = false;

	private $path = false;


	/**
	 * Open file by path and stores it on success.
	 *
	 * @param string $path
	 *
	 * @return bool
	 */
	public function open( $path ) {

		if ( ! file_exists( $path ) || ! is_readable( $path ) ) {
			$this->path = false;

			return false;
		}

		$this->path = $path;

		return true;
	}


	/**
	 * @throws Toolset_Filesystem_Exception
	 */
	private function open_file() {
		if ( ! $this->path ) {
			throw new Toolset_Filesystem_Exception( 'No file selected.' );
		}

		$this->handle = fopen( $this->path, 'rb' );
	}


	/**
	 * Close file
	 */
	private function close_file() {
		// already closed
		if ( ! $this->handle ) {
			return;
		}

		fclose( $this->handle );
		$this->handle = false;
	}


	/**
	 * Search for string
	 *
	 * @param string|string[] $search
	 * @param string $return
	 *
	 * @return bool
	 * @throws Toolset_Filesystem_Exception
	 */
	public function search( $search, $return = 'bool' ) {
		$this->open_file();

		if ( ! is_array( $search ) ) {
			$search = array( $search );
		}

		while ( ( $line = fgets( $this->handle ) ) !== false ) {
			foreach ( $search as $needle ) {
				if ( $return === 'bool' && strpos( $line, $needle ) !== false ) {
					$this->close_file();

					return true;
				}
			}
		}

		$this->close_file();

		return false;
	}
}

/** @noinspection PhpIgnoredClassAliasDeclaration */
class_alias( File::class, 'Toolset_Filesystem_File' );
