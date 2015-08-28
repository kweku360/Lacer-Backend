<?php

namespace Base;

use \SuitsQuery as ChildSuitsQuery;
use \Exception;
use \PDO;
use Map\SuitsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'suits' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Suits implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\SuitsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the suitnumber field.
     * @var        string
     */
    protected $suitnumber;

    /**
     * The value for the type field.
     * @var        string
     */
    protected $type;

    /**
     * The value for the plaintifflawyerid field.
     * @var        int
     */
    protected $plaintifflawyerid;

    /**
     * The value for the plaintifflawyername field.
     * @var        string
     */
    protected $plaintifflawyername;

    /**
     * The value for the defendantlawyerid field.
     * @var        int
     */
    protected $defendantlawyerid;

    /**
     * The value for the defendantlawyername field.
     * @var        string
     */
    protected $defendantlawyername;

    /**
     * The value for the datefiled field.
     * @var        int
     */
    protected $datefiled;

    /**
     * The value for the judgeid field.
     * @var        int
     */
    protected $judgeid;

    /**
     * The value for the judgename field.
     * @var        string
     */
    protected $judgename;

    /**
     * The value for the suitstatus field.
     * @var        string
     */
    protected $suitstatus;

    /**
     * The value for the dateofadjournment field.
     * @var        int
     */
    protected $dateofadjournment;

    /**
     * The value for the created field.
     * @var        int
     */
    protected $created;

    /**
     * The value for the modified field.
     * @var        int
     */
    protected $modified;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\Suits object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Suits</code> instance.  If
     * <code>obj</code> is an instance of <code>Suits</code>, delegates to
     * <code>equals(Suits)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Suits The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [suitnumber] column value.
     *
     * @return string
     */
    public function getSuitnumber()
    {
        return $this->suitnumber;
    }

    /**
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the [plaintifflawyerid] column value.
     *
     * @return int
     */
    public function getPlaintifflawyerid()
    {
        return $this->plaintifflawyerid;
    }

    /**
     * Get the [plaintifflawyername] column value.
     *
     * @return string
     */
    public function getPlaintifflawyername()
    {
        return $this->plaintifflawyername;
    }

    /**
     * Get the [defendantlawyerid] column value.
     *
     * @return int
     */
    public function getDefendantlawyerid()
    {
        return $this->defendantlawyerid;
    }

    /**
     * Get the [defendantlawyername] column value.
     *
     * @return string
     */
    public function getDefendantlawyername()
    {
        return $this->defendantlawyername;
    }

    /**
     * Get the [datefiled] column value.
     *
     * @return int
     */
    public function getDatefiled()
    {
        return $this->datefiled;
    }

    /**
     * Get the [judgeid] column value.
     *
     * @return int
     */
    public function getJudgeid()
    {
        return $this->judgeid;
    }

    /**
     * Get the [judgename] column value.
     *
     * @return string
     */
    public function getJudgename()
    {
        return $this->judgename;
    }

    /**
     * Get the [suitstatus] column value.
     *
     * @return string
     */
    public function getSuitstatus()
    {
        return $this->suitstatus;
    }

    /**
     * Get the [dateofadjournment] column value.
     *
     * @return int
     */
    public function getDateofadjournment()
    {
        return $this->dateofadjournment;
    }

    /**
     * Get the [created] column value.
     *
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get the [modified] column value.
     *
     * @return int
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[SuitsTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [suitnumber] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setSuitnumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->suitnumber !== $v) {
            $this->suitnumber = $v;
            $this->modifiedColumns[SuitsTableMap::COL_SUITNUMBER] = true;
        }

        return $this;
    } // setSuitnumber()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[SuitsTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [plaintifflawyerid] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setPlaintifflawyerid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->plaintifflawyerid !== $v) {
            $this->plaintifflawyerid = $v;
            $this->modifiedColumns[SuitsTableMap::COL_PLAINTIFFLAWYERID] = true;
        }

        return $this;
    } // setPlaintifflawyerid()

    /**
     * Set the value of [plaintifflawyername] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setPlaintifflawyername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->plaintifflawyername !== $v) {
            $this->plaintifflawyername = $v;
            $this->modifiedColumns[SuitsTableMap::COL_PLAINTIFFLAWYERNAME] = true;
        }

        return $this;
    } // setPlaintifflawyername()

    /**
     * Set the value of [defendantlawyerid] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setDefendantlawyerid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->defendantlawyerid !== $v) {
            $this->defendantlawyerid = $v;
            $this->modifiedColumns[SuitsTableMap::COL_DEFENDANTLAWYERID] = true;
        }

        return $this;
    } // setDefendantlawyerid()

    /**
     * Set the value of [defendantlawyername] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setDefendantlawyername($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->defendantlawyername !== $v) {
            $this->defendantlawyername = $v;
            $this->modifiedColumns[SuitsTableMap::COL_DEFENDANTLAWYERNAME] = true;
        }

        return $this;
    } // setDefendantlawyername()

    /**
     * Set the value of [datefiled] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setDatefiled($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->datefiled !== $v) {
            $this->datefiled = $v;
            $this->modifiedColumns[SuitsTableMap::COL_DATEFILED] = true;
        }

        return $this;
    } // setDatefiled()

    /**
     * Set the value of [judgeid] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setJudgeid($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->judgeid !== $v) {
            $this->judgeid = $v;
            $this->modifiedColumns[SuitsTableMap::COL_JUDGEID] = true;
        }

        return $this;
    } // setJudgeid()

    /**
     * Set the value of [judgename] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setJudgename($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->judgename !== $v) {
            $this->judgename = $v;
            $this->modifiedColumns[SuitsTableMap::COL_JUDGENAME] = true;
        }

        return $this;
    } // setJudgename()

    /**
     * Set the value of [suitstatus] column.
     *
     * @param string $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setSuitstatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->suitstatus !== $v) {
            $this->suitstatus = $v;
            $this->modifiedColumns[SuitsTableMap::COL_SUITSTATUS] = true;
        }

        return $this;
    } // setSuitstatus()

    /**
     * Set the value of [dateofadjournment] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setDateofadjournment($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dateofadjournment !== $v) {
            $this->dateofadjournment = $v;
            $this->modifiedColumns[SuitsTableMap::COL_DATEOFADJOURNMENT] = true;
        }

        return $this;
    } // setDateofadjournment()

    /**
     * Set the value of [created] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setCreated($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->created !== $v) {
            $this->created = $v;
            $this->modifiedColumns[SuitsTableMap::COL_CREATED] = true;
        }

        return $this;
    } // setCreated()

    /**
     * Set the value of [modified] column.
     *
     * @param int $v new value
     * @return $this|\Suits The current object (for fluent API support)
     */
    public function setModified($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->modified !== $v) {
            $this->modified = $v;
            $this->modifiedColumns[SuitsTableMap::COL_MODIFIED] = true;
        }

        return $this;
    } // setModified()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : SuitsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : SuitsTableMap::translateFieldName('Suitnumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->suitnumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : SuitsTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : SuitsTableMap::translateFieldName('Plaintifflawyerid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->plaintifflawyerid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : SuitsTableMap::translateFieldName('Plaintifflawyername', TableMap::TYPE_PHPNAME, $indexType)];
            $this->plaintifflawyername = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : SuitsTableMap::translateFieldName('Defendantlawyerid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->defendantlawyerid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : SuitsTableMap::translateFieldName('Defendantlawyername', TableMap::TYPE_PHPNAME, $indexType)];
            $this->defendantlawyername = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : SuitsTableMap::translateFieldName('Datefiled', TableMap::TYPE_PHPNAME, $indexType)];
            $this->datefiled = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : SuitsTableMap::translateFieldName('Judgeid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->judgeid = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : SuitsTableMap::translateFieldName('Judgename', TableMap::TYPE_PHPNAME, $indexType)];
            $this->judgename = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : SuitsTableMap::translateFieldName('Suitstatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->suitstatus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : SuitsTableMap::translateFieldName('Dateofadjournment', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dateofadjournment = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : SuitsTableMap::translateFieldName('Created', TableMap::TYPE_PHPNAME, $indexType)];
            $this->created = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : SuitsTableMap::translateFieldName('Modified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->modified = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 14; // 14 = SuitsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Suits'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SuitsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildSuitsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Suits::setDeleted()
     * @see Suits::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildSuitsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(SuitsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SuitsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[SuitsTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SuitsTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SuitsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITNUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'suitnumber';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_PLAINTIFFLAWYERID)) {
            $modifiedColumns[':p' . $index++]  = 'plaintifflawyerid';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_PLAINTIFFLAWYERNAME)) {
            $modifiedColumns[':p' . $index++]  = 'plaintifflawyername';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DEFENDANTLAWYERID)) {
            $modifiedColumns[':p' . $index++]  = 'defendantlawyerid';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DEFENDANTLAWYERNAME)) {
            $modifiedColumns[':p' . $index++]  = 'defendantlawyername';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DATEFILED)) {
            $modifiedColumns[':p' . $index++]  = 'datefiled';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_JUDGEID)) {
            $modifiedColumns[':p' . $index++]  = 'judgeid';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_JUDGENAME)) {
            $modifiedColumns[':p' . $index++]  = 'judgename';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITSTATUS)) {
            $modifiedColumns[':p' . $index++]  = 'suitstatus';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DATEOFADJOURNMENT)) {
            $modifiedColumns[':p' . $index++]  = 'dateofadjournment';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_CREATED)) {
            $modifiedColumns[':p' . $index++]  = 'created';
        }
        if ($this->isColumnModified(SuitsTableMap::COL_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = 'modified';
        }

        $sql = sprintf(
            'INSERT INTO suits (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'suitnumber':
                        $stmt->bindValue($identifier, $this->suitnumber, PDO::PARAM_STR);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'plaintifflawyerid':
                        $stmt->bindValue($identifier, $this->plaintifflawyerid, PDO::PARAM_INT);
                        break;
                    case 'plaintifflawyername':
                        $stmt->bindValue($identifier, $this->plaintifflawyername, PDO::PARAM_STR);
                        break;
                    case 'defendantlawyerid':
                        $stmt->bindValue($identifier, $this->defendantlawyerid, PDO::PARAM_INT);
                        break;
                    case 'defendantlawyername':
                        $stmt->bindValue($identifier, $this->defendantlawyername, PDO::PARAM_STR);
                        break;
                    case 'datefiled':
                        $stmt->bindValue($identifier, $this->datefiled, PDO::PARAM_INT);
                        break;
                    case 'judgeid':
                        $stmt->bindValue($identifier, $this->judgeid, PDO::PARAM_INT);
                        break;
                    case 'judgename':
                        $stmt->bindValue($identifier, $this->judgename, PDO::PARAM_STR);
                        break;
                    case 'suitstatus':
                        $stmt->bindValue($identifier, $this->suitstatus, PDO::PARAM_STR);
                        break;
                    case 'dateofadjournment':
                        $stmt->bindValue($identifier, $this->dateofadjournment, PDO::PARAM_INT);
                        break;
                    case 'created':
                        $stmt->bindValue($identifier, $this->created, PDO::PARAM_INT);
                        break;
                    case 'modified':
                        $stmt->bindValue($identifier, $this->modified, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SuitsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getSuitnumber();
                break;
            case 2:
                return $this->getType();
                break;
            case 3:
                return $this->getPlaintifflawyerid();
                break;
            case 4:
                return $this->getPlaintifflawyername();
                break;
            case 5:
                return $this->getDefendantlawyerid();
                break;
            case 6:
                return $this->getDefendantlawyername();
                break;
            case 7:
                return $this->getDatefiled();
                break;
            case 8:
                return $this->getJudgeid();
                break;
            case 9:
                return $this->getJudgename();
                break;
            case 10:
                return $this->getSuitstatus();
                break;
            case 11:
                return $this->getDateofadjournment();
                break;
            case 12:
                return $this->getCreated();
                break;
            case 13:
                return $this->getModified();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Suits'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Suits'][$this->hashCode()] = true;
        $keys = SuitsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getSuitnumber(),
            $keys[2] => $this->getType(),
            $keys[3] => $this->getPlaintifflawyerid(),
            $keys[4] => $this->getPlaintifflawyername(),
            $keys[5] => $this->getDefendantlawyerid(),
            $keys[6] => $this->getDefendantlawyername(),
            $keys[7] => $this->getDatefiled(),
            $keys[8] => $this->getJudgeid(),
            $keys[9] => $this->getJudgename(),
            $keys[10] => $this->getSuitstatus(),
            $keys[11] => $this->getDateofadjournment(),
            $keys[12] => $this->getCreated(),
            $keys[13] => $this->getModified(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Suits
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = SuitsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Suits
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setSuitnumber($value);
                break;
            case 2:
                $this->setType($value);
                break;
            case 3:
                $this->setPlaintifflawyerid($value);
                break;
            case 4:
                $this->setPlaintifflawyername($value);
                break;
            case 5:
                $this->setDefendantlawyerid($value);
                break;
            case 6:
                $this->setDefendantlawyername($value);
                break;
            case 7:
                $this->setDatefiled($value);
                break;
            case 8:
                $this->setJudgeid($value);
                break;
            case 9:
                $this->setJudgename($value);
                break;
            case 10:
                $this->setSuitstatus($value);
                break;
            case 11:
                $this->setDateofadjournment($value);
                break;
            case 12:
                $this->setCreated($value);
                break;
            case 13:
                $this->setModified($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = SuitsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setSuitnumber($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setType($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPlaintifflawyerid($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPlaintifflawyername($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDefendantlawyerid($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDefendantlawyername($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setDatefiled($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setJudgeid($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setJudgename($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSuitstatus($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setDateofadjournment($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCreated($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setModified($arr[$keys[13]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Suits The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SuitsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(SuitsTableMap::COL_ID)) {
            $criteria->add(SuitsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITNUMBER)) {
            $criteria->add(SuitsTableMap::COL_SUITNUMBER, $this->suitnumber);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_TYPE)) {
            $criteria->add(SuitsTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_PLAINTIFFLAWYERID)) {
            $criteria->add(SuitsTableMap::COL_PLAINTIFFLAWYERID, $this->plaintifflawyerid);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_PLAINTIFFLAWYERNAME)) {
            $criteria->add(SuitsTableMap::COL_PLAINTIFFLAWYERNAME, $this->plaintifflawyername);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DEFENDANTLAWYERID)) {
            $criteria->add(SuitsTableMap::COL_DEFENDANTLAWYERID, $this->defendantlawyerid);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DEFENDANTLAWYERNAME)) {
            $criteria->add(SuitsTableMap::COL_DEFENDANTLAWYERNAME, $this->defendantlawyername);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DATEFILED)) {
            $criteria->add(SuitsTableMap::COL_DATEFILED, $this->datefiled);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_JUDGEID)) {
            $criteria->add(SuitsTableMap::COL_JUDGEID, $this->judgeid);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_JUDGENAME)) {
            $criteria->add(SuitsTableMap::COL_JUDGENAME, $this->judgename);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_SUITSTATUS)) {
            $criteria->add(SuitsTableMap::COL_SUITSTATUS, $this->suitstatus);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_DATEOFADJOURNMENT)) {
            $criteria->add(SuitsTableMap::COL_DATEOFADJOURNMENT, $this->dateofadjournment);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_CREATED)) {
            $criteria->add(SuitsTableMap::COL_CREATED, $this->created);
        }
        if ($this->isColumnModified(SuitsTableMap::COL_MODIFIED)) {
            $criteria->add(SuitsTableMap::COL_MODIFIED, $this->modified);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildSuitsQuery::create();
        $criteria->add(SuitsTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Suits (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSuitnumber($this->getSuitnumber());
        $copyObj->setType($this->getType());
        $copyObj->setPlaintifflawyerid($this->getPlaintifflawyerid());
        $copyObj->setPlaintifflawyername($this->getPlaintifflawyername());
        $copyObj->setDefendantlawyerid($this->getDefendantlawyerid());
        $copyObj->setDefendantlawyername($this->getDefendantlawyername());
        $copyObj->setDatefiled($this->getDatefiled());
        $copyObj->setJudgeid($this->getJudgeid());
        $copyObj->setJudgename($this->getJudgename());
        $copyObj->setSuitstatus($this->getSuitstatus());
        $copyObj->setDateofadjournment($this->getDateofadjournment());
        $copyObj->setCreated($this->getCreated());
        $copyObj->setModified($this->getModified());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Suits Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->suitnumber = null;
        $this->type = null;
        $this->plaintifflawyerid = null;
        $this->plaintifflawyername = null;
        $this->defendantlawyerid = null;
        $this->defendantlawyername = null;
        $this->datefiled = null;
        $this->judgeid = null;
        $this->judgename = null;
        $this->suitstatus = null;
        $this->dateofadjournment = null;
        $this->created = null;
        $this->modified = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SuitsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
