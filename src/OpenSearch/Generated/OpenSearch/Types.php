<?php
namespace OpenSearch\Generated\OpenSearch;

/**
 * Autogenerated by Thrift Compiler (0.10.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


class OpenSearch {
  static $_TSPEC;

  /**
   * @var string
   */
  public $accessKey = null;
  /**
   * @var string
   */
  public $secret = null;
  /**
   * @var string
   */
  public $host = null;
  /**
   * @var array
   */
  public $options = null;
  /**
   * @var bool
   */
  public $gzip = true;
  /**
   * @var int
   */
  public $timeout = null;
  /**
   * @var int
   */
  public $connectTimeout = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'accessKey',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'secret',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'host',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'options',
          'type' => TType::MAP,
          'ktype' => TType::STRING,
          'vtype' => TType::STRING,
          'key' => array(
            'type' => TType::STRING,
          ),
          'val' => array(
            'type' => TType::STRING,
            ),
          ),
        5 => array(
          'var' => 'gzip',
          'type' => TType::BOOL,
          ),
        6 => array(
          'var' => 'timeout',
          'type' => TType::I32,
          ),
        7 => array(
          'var' => 'connectTimeout',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['accessKey'])) {
        $this->accessKey = $vals['accessKey'];
      }
      if (isset($vals['secret'])) {
        $this->secret = $vals['secret'];
      }
      if (isset($vals['host'])) {
        $this->host = $vals['host'];
      }
      if (isset($vals['options'])) {
        $this->options = $vals['options'];
      }
      if (isset($vals['gzip'])) {
        $this->gzip = $vals['gzip'];
      }
      if (isset($vals['timeout'])) {
        $this->timeout = $vals['timeout'];
      }
      if (isset($vals['connectTimeout'])) {
        $this->connectTimeout = $vals['connectTimeout'];
      }
    }
  }

  public function getName() {
    return 'OpenSearch';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->accessKey);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->secret);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->host);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::MAP) {
            $this->options = array();
            $_size0 = 0;
            $_ktype1 = 0;
            $_vtype2 = 0;
            $xfer += $input->readMapBegin($_ktype1, $_vtype2, $_size0);
            for ($_i4 = 0; $_i4 < $_size0; ++$_i4)
            {
              $key5 = '';
              $val6 = '';
              $xfer += $input->readString($key5);
              $xfer += $input->readString($val6);
              $this->options[$key5] = $val6;
            }
            $xfer += $input->readMapEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->gzip);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->timeout);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->connectTimeout);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('OpenSearch');
    if ($this->accessKey !== null) {
      $xfer += $output->writeFieldBegin('accessKey', TType::STRING, 1);
      $xfer += $output->writeString($this->accessKey);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->secret !== null) {
      $xfer += $output->writeFieldBegin('secret', TType::STRING, 2);
      $xfer += $output->writeString($this->secret);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->host !== null) {
      $xfer += $output->writeFieldBegin('host', TType::STRING, 3);
      $xfer += $output->writeString($this->host);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->options !== null) {
      if (!is_array($this->options)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('options', TType::MAP, 4);
      {
        $output->writeMapBegin(TType::STRING, TType::STRING, count($this->options));
        {
          foreach ($this->options as $kiter7 => $viter8)
          {
            $xfer += $output->writeString($kiter7);
            $xfer += $output->writeString($viter8);
          }
        }
        $output->writeMapEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->gzip !== null) {
      $xfer += $output->writeFieldBegin('gzip', TType::BOOL, 5);
      $xfer += $output->writeBool($this->gzip);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->timeout !== null) {
      $xfer += $output->writeFieldBegin('timeout', TType::I32, 6);
      $xfer += $output->writeI32($this->timeout);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->connectTimeout !== null) {
      $xfer += $output->writeFieldBegin('connectTimeout', TType::I32, 7);
      $xfer += $output->writeI32($this->connectTimeout);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

final class Constant extends \Thrift\Type\TConstant {
  static protected $VERSION;

  static protected function init_VERSION() {
    return "3.2.0";
  }
}


