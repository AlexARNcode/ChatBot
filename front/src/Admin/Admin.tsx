import React, { useEffect } from "react";
import axios from "axios";
import { useState } from "react";
import { v4 as uuidv4 } from "uuid";
import NewQuestion from "./Components/NewQuestion";
import { deleteQuestionAnswerCouple } from "./services/deleteQuestionAnswerCouple";
import { getAllQuestionsAnswersCouples } from "./services/getAllQuestionsAnswersCouples";
import { clickOnModifyButton } from "./services/clickOnModifyButton";

export default function Admin() {

const [allQuestionsAndAnswers, setAllQuestionsAndAnswers] = useState<any>();
const [isLoading, setIsLoading] = useState(true);
const [newQuestionIsActive, setNewQuestionIsActive] = useState(false);

useEffect(() => {
    getAllQuestionsAnswersCouples(setAllQuestionsAndAnswers, setIsLoading);
}, []);

/** UI changes */

function addUiQuestionAndAnswerCouple(e: any) {
  setNewQuestionIsActive(!newQuestionIsActive)
  e.target.textContent == "Ajouter une question" ? 
    e.target.textContent = "Annuler" : e.target.textContent = "Ajouter une question"
}

// API

function updateApiQuestionAndAnswerCouple(e: any) {
  const questionAnswerCoupleId = (e.target.getAttribute("data-key"));
  axios.put('http://127.0.0.1:8000/questions-answers-couples/' + questionAnswerCoupleId
  )
  .then(function (response) {
    console.log("PUT OK")
  })
  .catch(function (error) {
    console.log("Error :");
    console.log(error);
  });
}

return ( 
<div className="container border mt-4 mb-4">
  <h1>Liste des questions/réponses</h1>
    { isLoading && <p>Chargement...</p> }

    <button type="button" className="btn btn-primary mt-2 mb-2" onClick={ addUiQuestionAndAnswerCouple }>
      Ajouter une question
    </button>

    {newQuestionIsActive && <NewQuestion />}

    {allQuestionsAndAnswers && 
      allQuestionsAndAnswers.map(
        (questionAndAnswer: { id: number, message: string, answer: string }) => 
        <div  key={uuidv4()}>
          <div className="mt-4 mb-4 border p-3">
            <label htmlFor="userQuestion" className="form-label">Question</label>
            <input 
              className="form-control" 
              type="text" 
              id="userQuestion" 
              value={questionAndAnswer.message} 
              disabled
            />

            <label htmlFor="userAnswer" className="form-label">Réponse</label>
            <input 
              className="form-control mb-3" 
              type="text" 
              id="userAnswer" 
              value={questionAndAnswer.answer} 
              disabled
            />

            <button type="button" 
              className="btn btn-primary mr-2" 
              onClick = { e => clickOnModifyButton(e, setNewQuestionIsActive, newQuestionIsActive) }>
                Modifier
            </button>

            <button 
              type="button" 
              className="btn btn-danger mr-2" 
              onClick={ e => deleteQuestionAnswerCouple(e, allQuestionsAndAnswers, setAllQuestionsAndAnswers) } 
              data-key={ questionAndAnswer.id }
              >
                Supprimer
            </button>

            <button 
              type="button" 
              className="btn btn-success" 
              id="saveButton" 
              hidden 
              onClick={ updateApiQuestionAndAnswerCouple }
              data-key= { questionAndAnswer.id }
              >Enregistrer
            </button>
          </div>
        </div>
      )}
</div>
);

}