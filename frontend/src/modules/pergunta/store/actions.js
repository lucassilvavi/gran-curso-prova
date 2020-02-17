import * as types from './types';
import * as programaService from '../service/programa';

export const buscarBancasAction = ({commit}, coOrgao) => programaService
  .buscarBancas(coOrgao)
  .then((response) => {
    commit(types.SET_BANCAS, response.data);
    return response;
  });

export const buscarOrgaosAction = ({commit}) => programaService
  .buscarOrgaos()
  .then((response) => {
    commit(types.SET_ORGAOS, response.data);
    return response;
  });

export const cadastrarProgramaAction = ({commit}, {idOrgao, idBanca}) => {
  return programaService.buscarAssuntos(idBanca, idOrgao)
    .then((response) => {
      commit(types.SET_PROGRAMA, response.data);
    });
};
