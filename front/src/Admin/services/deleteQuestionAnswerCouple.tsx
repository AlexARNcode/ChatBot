import axios from "axios";

export function deleteQuestionAnswerCouple(
  e: any, 
  allQuestionsAndAnswers: any[], 
  setAllQuestionsAndAnswers: (arg0: any[]) => void
  ) {
    const questionAnswerCoupleId = (e.target.getAttribute("data-key"));

    /** API CALL */
    axios.delete('http://127.0.0.1:8000/questions-answers-couples/' + questionAnswerCoupleId
    )
    .then(function (response) {
       /** UI Changes */
      // set state with new array where the id is different than the one being deleted
      const newAllQuestionsAndAnswers = allQuestionsAndAnswers.filter((questionAndAnswer: any) => questionAndAnswer.id != questionAnswerCoupleId)
      setAllQuestionsAndAnswers(newAllQuestionsAndAnswers);
    })
    .catch(function (error) {
      console.log(error);
    });
}