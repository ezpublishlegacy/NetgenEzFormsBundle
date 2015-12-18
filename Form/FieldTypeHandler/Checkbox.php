<?php

namespace Netgen\Bundle\EzFormsBundle\Form\FieldTypeHandler;

use eZ\Publish\SPI\FieldType\Value;
use Netgen\Bundle\EzFormsBundle\Form\FieldTypeHandler;
use Symfony\Component\Form\FormBuilderInterface;
use eZ\Publish\API\Repository\Values\ContentType\FieldDefinition;
use eZ\Publish\API\Repository\Values\Content\Content;
use eZ\Publish\Core\FieldType\Checkbox as CheckboxValue;

class Checkbox extends FieldTypeHandler
{
    /**
     * {@inheritdoc}
     */
    protected function buildFieldForm(
        FormBuilderInterface $formBuilder,
        FieldDefinition $fieldDefinition,
        $languageCode,
        Content $content = null
    ) {
        $options = $this->getDefaultFieldOptions($fieldDefinition, $languageCode, $content);
        $options['data'] = $fieldDefinition->defaultValue->bool;

        $formBuilder->add($fieldDefinition->identifier, 'checkbox', $options);
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function convertFieldValueToForm(Value $value, FieldDefinition $fieldDefinition = null)
    {
        return $value->bool;
    }

    /**
     * {@inheritdoc}
     *
     * @return CheckboxValue\Value
     */
    public function convertFieldValueFromForm($data)
    {
        return new CheckboxValue\Value($data);
    }
}
