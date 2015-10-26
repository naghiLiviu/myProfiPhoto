<?php

/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/23/15
 * Time: 4:53 PM
 */
class Topic extends AbstractModel
{
    public function getTopic($sectionId)
    {

        $sqlString = 'SELECT * FROM Topic
                      LEFT JOIN Comment ON Comment.TopicId = Topic.TopicId
                      LEFT JOIN User ON Comment.UserId = User.UserId
                      WHERE Topic.SectionId = "' . $sectionId . '" AND Topic.TopicStatus="Active" AND Comment.CommentStatus="Active"
                            GROUP BY Topic.TopicId
                            ORDER BY Comment.CommentId DESC';
        $result = $this->query($sqlString);

        return $result;
    }


    public function searchTopicAndSection($data)
    {
        $sqlString = 'SELECT * FROM Topic
            LEFT JOIN Section
            ON Topic.SectionId=Section.SectionId
            WHERE TopicName LIKE  "%' . $data . '%" OR SectionName LIKE "%' . $data . '%"  ';
        $result = $this->query($sqlString);
        return $result;

    }

    public function countTopics()
    {
        $sqlString = 'SELECT TopicId FROM Topic';
        $result = $this->query($sqlString);
        $countTopics = $result->num_rows;
        return $countTopics;
    }

    public function getTopicWithSectionId($sectionId) {
        $sqlString = 'SELECT * FROM Topic WHERE SectionId = "' . $sectionId . '" AND TopicStatus = "Active"';
        $result = $this->query($sqlString);

        return $result;
    }
}