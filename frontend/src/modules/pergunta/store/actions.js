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

export const cadastrarProgramaAction = ({commit}, params) => {
  return programaService.buscarAssuntos(params.banca.id, params.orgao.id)
    .then((response) => {
      const programa = params;
      programa.questoes = response.data;
      commit(types.SET_PROGRAMA, programa);
    });
};
