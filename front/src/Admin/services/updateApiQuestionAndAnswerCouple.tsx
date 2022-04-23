import axios from "axios";

/** @todo */
export function updateApiQuestionAndAnswerCouple(e:any) {
    const questionAnswerCoupleId = (e.target.getAttribute("data-key"));
    axios.put('http://127.0.0.1:8000/questions-answers-couples/' + questionAnswerCoupleId
    )
    .then(function (response) {
        console.log("PUT TO DO")
    })
    .catch(function (error) {
        console.log("Error TO DO :");
        console.log(error);
    });
}