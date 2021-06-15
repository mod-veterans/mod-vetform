<?php


namespace App\Services\Forms\Medals\Groups\Service\Branch;


class ServiceMedal extends \App\Services\Forms\BasePage
{
    protected string $_title = 'What medals did you earn?';

  function setQuestions(): void
  {

      $this->_questions = [
          [
              'component' => 'checkbox-group',
              'options' => [
                  'field' => $this->namespace . '/receiving-benefits',
                  'label' => 'Are you receiving any of the following?',
                  'hideLabel' => true,
                  'options' => [
                      ['label' => 'George Cross', 'children' => []],
                      ['label' => 'Purple Smart', 'children' => []],
                      ['label' => 'I\'m Cross', 'children' => []],
                  ],
              ],
          ]
      ];
  }
}
