<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Upload extends CI_Upload {

    public function is_allowed_filetype($ignore_mime = FALSE)
    {
        if ($this->allowed_types === '*')
        {
            return TRUE;
        }

        if (empty($this->allowed_types) OR ! is_array($this->allowed_types))
        {
            $this->set_error('upload_no_file_types', 'debug');
            return FALSE;
        }

        $ext = strtolower(ltrim($this->file_ext, '.'));

        if ( ! in_array($ext, $this->allowed_types, TRUE))
        {
            return FALSE;
        }

        // Bypass semua MIME check — cukup cek ekstensi saja
        return TRUE;
    }
}