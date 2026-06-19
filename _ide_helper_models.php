<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $profile_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminsProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminsProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminsProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminsProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminsProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminsProfile whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminsProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AdminsProfile whereUserId($value)
 */
	class AdminsProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $berkas_cv
 * @property string|null $profile_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AsesorProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AsesorProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AsesorProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AsesorProfile whereBerkasCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AsesorProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AsesorProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AsesorProfile whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AsesorProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AsesorProfile whereUserId($value)
 */
	class AsesorProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $price
 * @property string|null $banner_img
 * @property string|null $time_limit
 * @property int|null $passing_score
 * @property int $is_locked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Level|null $level
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionA> $questionsA
 * @property-read int|null $questions_a_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA whereBannerImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA whereIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA wherePassingScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA whereTimeLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryA whereUpdatedAt($value)
 */
	class CategoryA extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $status
 * @property string|null $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionB> $questionsB
 * @property-read int|null $questions_b_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryB whereUpdatedAt($value)
 */
	class CategoryB extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $status
 * @property string|null $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionC> $questionsC
 * @property-read int|null $questions_c_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CategoryC whereUpdatedAt($value)
 */
	class CategoryC extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int|null $level_id
 * @property string $certificate_number
 * @property string $name
 * @property \Illuminate\Support\Carbon $issue_date
 * @property int $download_count
 * @property string|null $last_downloaded_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Level|null $level
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereCertificateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereDownloadCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereIssueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereLastDownloadedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Certificate whereUserId($value)
 */
	class Certificate extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $thread_id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Like> $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\Thread $thread
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Comment whereUserId($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * District Model.
 *
 * @property int $id
 * @property string $regency_id
 * @property string $name
 * @property-read \App\Models\Regency $regency
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Village> $villages
 * @property-read int|null $villages_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereRegencyId($value)
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $category_a_id
 * @property string $status
 * @property int|null $score
 * @property int $total_questions
 * @property int $unanswered_questions
 * @property int $correct_answers
 * @property string $duration
 * @property int $wrong_answers
 * @property int|null $is_passed
 * @property \Illuminate\Support\Carbon $start_time
 * @property \Illuminate\Support\Carbon|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CategoryA $categoryA
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ExamA> $examsA
 * @property-read int|null $exams_a_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\QuestionA> $questionsA
 * @property-read int|null $questions_a_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereCategoryAId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereCorrectAnswers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereIsPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereTotalQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereUnansweredQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamA whereWrongAnswers($value)
 */
	class ExamA extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $category_a_id
 * @property string $status
 * @property int|null $score
 * @property int $total_questions
 * @property int $unanswered_questions
 * @property int $correct_answers
 * @property string $duration
 * @property int $wrong_answers
 * @property int|null $is_passed
 * @property string $start_time
 * @property string|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CategoryA $categoryA
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereCategoryAId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereCorrectAnswers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereIsPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereTotalQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereUnansweredQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamAsesi whereWrongAnswers($value)
 */
	class ExamAsesi extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $exam_a_id
 * @property int $question_a_id
 * @property string|null $user_answer
 * @property int|null $is_correct
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA whereExamAId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA whereQuestionAId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamQuestionA whereUserAnswer($value)
 */
	class ExamQuestionA extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $started_at
 * @property string|null $completed_at
 * @property int $is_completed
 * @property int|null $total_score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC whereIsCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC whereTotalScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamSessionC whereUserId($value)
 */
	class ExamSessionC extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $level_name
 * @property string|null $promo_code
 * @property string|null $image
 * @property numeric|null $price Harga dasar sertifikat
 * @property int|null $discount Diskon dalam persentase
 * @property numeric|null $final_price Harga akhir setelah diskon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Certificate> $certificates
 * @property-read int|null $certificates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payment
 * @property-read int|null $payment_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereFinalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level wherePromoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Level whereUpdatedAt($value)
 */
	class Level extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $category
 * @property string|null $file_ppt
 * @property string|null $modul_ajar
 * @property string|null $description
 * @property string|null $is_passed
 * @property string|null $comment_asesor
 * @property string|null $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereCommentAsesor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereFilePpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereIsPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereModulAjar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBHistory whereUserId($value)
 */
	class LevelBHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $file_ppt
 * @property string|null $modul_ajar
 * @property string|null $description
 * @property string $status
 * @property string|null $is_passed
 * @property string|null $comment_asesor
 * @property string|null $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereCommentAsesor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereFilePpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereIsPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereModulAjar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelBSubmission whereUserId($value)
 */
	class LevelBSubmission extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $category
 * @property string|null $url_video
 * @property string $description
 * @property string|null $is_passed
 * @property string|null $comment_asesor
 * @property string $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereCommentAsesor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereIsPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereUrlVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCHistory whereUserId($value)
 */
	class LevelCHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $category
 * @property string|null $url_video
 * @property string|null $description
 * @property string $status
 * @property string|null $is_passed
 * @property string|null $comment_asesor
 * @property string|null $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereCommentAsesor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereIsPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereUrlVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LevelCSubmission whereUserId($value)
 */
	class LevelCSubmission extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $likeable_type
 * @property int $likeable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $likeable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Like newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Like newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Like query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Like whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Like whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Like whereLikeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Like whereLikeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Like whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Like whereUserId($value)
 */
	class Like extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $summary
 * @property string $content
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $formatted_created_at
 * @property-read string $truncated_content
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|News whereUpdatedAt($value)
 */
	class News extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $level_id
 * @property string $order_id
 * @property numeric $amount
 * @property numeric $original_amount
 * @property numeric $discount_amount
 * @property string $mode
 * @property array<array-key, mixed>|null $selected_categories
 * @property string $status
 * @property string $payment_method
 * @property string|null $transfer_proof
 * @property string|null $ig_follow_proof
 * @property \Illuminate\Support\Carbon|null $confirmed_at
 * @property string|null $snap_token
 * @property string|null $transaction_id
 * @property string|null $payment_type
 * @property \Illuminate\Support\Carbon|null $payment_time
 * @property array<array-key, mixed>|null $payment_details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $confirmed_by
 * @property int|null $voucher_id
 * @property-read \App\Models\User|null $confirmedBy
 * @property-read \App\Models\Level $level
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Voucher|null $voucher
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereConfirmedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereIgFollowProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereOriginalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereSelectedCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereSnapToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereTransferProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereVoucherId($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * Province Model.
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\District> $districts
 * @property-read int|null $districts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Regency> $regencies
 * @property-read int|null $regencies_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Province whereName($value)
 */
	class Province extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $category_a_id
 * @property string $question_text
 * @property string|null $image
 * @property string|null $option_a
 * @property string|null $option_b
 * @property string|null $option_c
 * @property string|null $option_d
 * @property string|null $option_e
 * @property string $correct_answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CategoryA $categoryA
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereCategoryAId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereCorrectAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereOptionA($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereOptionB($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereOptionC($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereOptionD($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereOptionE($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereQuestionText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionA whereUpdatedAt($value)
 */
	class QuestionA extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $category_b_id
 * @property string $question_text
 * @property string $option_a
 * @property string $option_b
 * @property string $option_c
 * @property string $option_d
 * @property string $correct_answer
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CategoryB $categoryB
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereCategoryBId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereCorrectAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereOptionA($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereOptionB($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereOptionC($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereOptionD($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereQuestionText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionB whereUpdatedAt($value)
 */
	class QuestionB extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $title
 * @property string|null $question
 * @property string|null $image_url
 * @property int $order
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CategoryC|null $categoryC
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserAnswerC> $userAnswers
 * @property-read int|null $user_answers_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC ordered()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|QuestionC whereUpdatedAt($value)
 */
	class QuestionC extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $title
 * @property string|null $button_text
 * @property string|null $link
 * @property bool $is_active
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner search($term)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner whereButtonText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferralBanner whereUpdatedAt($value)
 */
	class ReferralBanner extends \Eloquent {}
}

namespace App\Models{
/**
 * Regency Model.
 *
 * @property int $id
 * @property string $province_id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\District> $districts
 * @property-read int|null $districts_count
 * @property-read \App\Models\Province $province
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Village> $villages
 * @property-read int|null $villages_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Regency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Regency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Regency query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Regency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Regency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Regency whereProvinceId($value)
 */
	class Regency extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $category_a_id
 * @property string $status
 * @property int|null $score
 * @property int $total_questions
 * @property int $unanswered_questions
 * @property int $correct_answers
 * @property string $duration
 * @property int $wrong_answers
 * @property int|null $is_passed
 * @property string $start_time
 * @property string|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CategoryA $categoryA
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereCategoryAId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereCorrectAnswers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereIsPassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereTotalQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereUnansweredQuestions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResultA whereWrongAnswers($value)
 */
	class ResultA extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $instagram
 * @property string|null $linkedin
 * @property string|null $facebook
 * @property string|null $youtube
 * @property string|null $whatsapp
 * @property string|null $email
 * @property string|null $address
 * @property string|null $description
 * @property string $payment_method
 * @property string|null $bank_name
 * @property string|null $bank_account_number
 * @property string|null $bank_account_name
 * @property string|null $payment_instructions
 * @property int $require_ig_follow_proof
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereBankAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereBankAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo wherePaymentInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereRequireIgFollowProof($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereWhatsapp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SiteInfo whereYoutube($value)
 */
	class SiteInfo extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $umur_range
 * @property string|null $status_pekerjaan
 * @property string|null $tempat_bekerja
 * @property array<array-key, mixed>|null $tujuan_sertifikasi
 * @property int|null $rating_materi Q1: Materi sesuai
 * @property int|null $rating_trainer Q2: Trainer jelas
 * @property int|null $rating_uji Q3: Uji adil
 * @property int|null $rating_peningkatan_kompetensi Q4: Kompetensi meningkat
 * @property int|null $rating_penerapan Q5: Penerapan kerja
 * @property string|null $essay_perubahan
 * @property string|null $essay_manfaat
 * @property string|null $essay_saran
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereEssayManfaat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereEssayPerubahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereEssaySaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereRatingMateri($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereRatingPenerapan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereRatingPeningkatanKompetensi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereRatingTrainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereRatingUji($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereStatusPekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereTempatBekerja($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereTujuanSertifikasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereUmurRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereUserId($value)
 */
	class SurveySubmission extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $batch_id
 * @property string $category
 * @property string $title
 * @property string $body
 * @property string|null $image_path
 * @property \Illuminate\Support\Carbon $starts_at
 * @property \Illuminate\Support\Carbon $ends_at
 * @property int $max_submissions
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TaskBatch $batch
 * @property-read \App\Models\User $creator
 * @property-read mixed $category_color_class
 * @property-read mixed $category_label
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TaskSubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereBatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereMaxSubmissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUpdatedAt($value)
 */
	class Task extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task> $tasks
 * @property-read int|null $tasks_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskBatch whereUpdatedAt($value)
 */
	class TaskBatch extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property string $file_path
 * @property int $submission_count
 * @property \Illuminate\Support\Carbon|null $submitted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Task $task
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission whereSubmissionCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaskSubmission whereUserId($value)
 */
	class TaskSubmission extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $category_a_id
 * @property int $exam_a_id
 * @property string $content
 * @property int|null $rating
 * @property bool $is_approved
 * @property bool $is_featured
 * @property \Illuminate\Support\Carbon|null $approved_at
 * @property int|null $approved_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $approver
 * @property-read \App\Models\CategoryA $category
 * @property-read \App\Models\ExamA $exam
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial featuredandApproved()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereCategoryAId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereExamAId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereUserId($value)
 */
	class Testimonial extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Like> $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thread whereUserId($value)
 */
	class Thread extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $status
 * @property string|null $remember_token
 * @property string|null $last_seen_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LevelBSubmission> $LevelBSubmission
 * @property-read int|null $level_b_submission_count
 * @property-read \App\Models\AdminsProfile|null $adminsProfile
 * @property-read \App\Models\AsesorProfile|null $asesorProfile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExamSessionC> $examSessions
 * @property-read int|null $exam_sessions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExamA> $examsA
 * @property-read int|null $exams_a_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Payment|null $payment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\SurveySubmission|null $surveyKepuasan
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Testimonial> $testimonials
 * @property-read int|null $testimonials_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Thread> $threads
 * @property-read int|null $threads_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserAnswerC> $userAnswers
 * @property-read int|null $user_answers_count
 * @property-read \App\Models\UserProfile|null $userProfile
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastSeenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $question_c_id
 * @property string|null $answer
 * @property int|null $score
 * @property string|null $comment_asesor
 * @property bool $is_completed
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\QuestionC|null $question
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereCommentAsesor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereIsCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereQuestionCId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAnswerC whereUserId($value)
 */
	class UserAnswerC extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $nik
 * @property string|null $nama_depan
 * @property string|null $instansi
 * @property string|null $profesi
 * @property string|null $lama_masa_kerja
 * @property string|null $latar_belakang_pendidikan
 * @property string|null $nama_universitas
 * @property string|null $program_studi
 * @property string|null $tahun_studi
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $no_wa
 * @property string|null $profile_image
 * @property string|null $custom_instansi
 * @property string|null $provinsi
 * @property string|null $kecamatan
 * @property string|null $kabupaten
 * @property string|null $kelurahan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereCustomInstansi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereInstansi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereKelurahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereLamaMasaKerja($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereLatarBelakangPendidikan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereNamaDepan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereNamaUniversitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereNoWa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereProfesi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereProgramStudi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereProvinsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereTahunStudi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserProfile whereUserId($value)
 */
	class UserProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * Village Model.
 *
 * @property int $id
 * @property string $district_id
 * @property string $name
 * @property-read \App\Models\District $district
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Village newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Village newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Village query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Village whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Village whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Village whereName($value)
 */
	class Village extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $type
 * @property numeric|null $value
 * @property int|null $max_uses
 * @property int $uses
 * @property \Illuminate\Support\Carbon|null $valid_from
 * @property \Illuminate\Support\Carbon|null $valid_until
 * @property int|null $created_by
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereMaxUses($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereUses($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereValidFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereValidUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereValue($value)
 */
	class Voucher extends \Eloquent {}
}

