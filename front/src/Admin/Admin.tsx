import React, { useEffect } from "react";
import axios from "axios";
import { useState } from "react";

export default function Admin() {

const [allQuestionsAndAnswers, setAllQuestionsAndAnswers] = useState<any>();

useEffect(() => {
    getAllQuestionsAnswersCouples();
}, []);

async function getAllQuestionsAnswersCouples() {
    try {
        const { data, status } = await axios.get(
          'http://127.0.0.1:8000/questions-answers-couples',
          {
            headers: {
              Accept: 'application/json',
            },
          },
        );
    
        if (status === 200) {
            setAllQuestionsAndAnswers(data);
        }
    
      } catch (error) {
        if (axios.isAxiosError(error)) {
          console.log('error message: ', error.message);
          return error.message;
        } else {
          console.log('unexpected error: ', error);
          return 'An unexpected error occurred';
        }
      }
    }

    return ( 
    <div className="container border mt-4 mb-4">
      <h1>Liste des questions/réponses</h1>
          {
            allQuestionsAndAnswers && 
            allQuestionsAndAnswers.map(
              (questionAndAnswer: { id: number, message: string, answer: string }) => 
              <>
                <div className="mt-4 mb-4 border p-3" key={ questionAndAnswer.id }>
                  <label htmlFor="userQuestion" className="form-label">Question</label>
                  <input className="form-control" type="text" id="userQuestion" placeholder={questionAndAnswer.message} disabled/>
                  <label htmlFor="userAnswer" className="form-label">Réponse</label>
                  <input className="form-control mb-3" type="text" placeholder={questionAndAnswer.answer} disabled/>
                  <button type="button" className="btn btn-primary mr-2">Modifier</button>
                  <button type="button" className="btn btn-danger">Supprimer</button>
                </div>
              </>
            )}
    </div>
    );

}