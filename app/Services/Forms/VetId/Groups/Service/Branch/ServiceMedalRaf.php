<?php


namespace App\Services\Forms\VetId\Groups\Service\Branch;


class ServiceMedalRaf extends \App\Services\Forms\BasePage
{
    protected string $_title = 'What medal(s) did you earn?';

  function setQuestions(): void
  {

      $this->_questions = [
          [
              'component' => 'checkbox-group',
              'options' => [
                  'field' => $this->namespace . '/medal-earned',
                  'label' => 'What medal(s) did you earn?',
                  'hideLabel' => true,
                  'options' => [
                      ['label' => 'City & Guilds Automotive Maintenance and Repair', 'children' => []],
                      ['label' => 'Advanced Auto Diagnostic Techniques', 'children' => []],
                      ['label' => 'Puncture repair', 'children' => []],
                  ],
              ],
          ]
      ];
  }
}
